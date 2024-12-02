<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die('You must be logged in to access the cart.');
}else {
}

include './login/connect.php';

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Fetch items from the user's cart
$stmt = $conn->prepare("SELECT uc.*, i.name, i.price, i.image_path
                        FROM user_cart uc 
                        JOIN items i ON uc.item_id = i.id 
                        WHERE uc.user_id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cart_items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Cart</title>
</head>
<body>
    <nav>
        <div class="left">
            <a href="Mens.php">MENS</a>
            <a href="Womens.php">WOMENS</a>
            <a href="Children.php">CHILDRENS</a>
        </div>
        <div class="middle">
            <a href="">KAL VIN</a>
        </div>
        <div class="right">
            <a href="index.php">HOME</a>
            <a href="cart.php">CART</a>
            <a href="logout.php">ACCOUNT</a>
        </div>
    </nav>
    <div class="container">
        <div class="panel">
            <h1>Your cart</h1>
            <div class="quan-size">
                <p>Quantity</p>
                <p>Size</p>
            </div>
            <div class="cart-shower">
                <?php if (empty($cart_items)): ?>
                <p style="font-family: Poppins; margin-left:2rem;">Your cart is empty.</p>
                <?php else: ?>
                    <?php foreach ($cart_items as $item): ?>
                        <div class="carts" data-price="<?= $item['price'] ?>" data-id="<?= $item['item_id'] ?>" >
                            <input type="checkbox" class="item-checkbox">
                            <img src="<?= $item['image_path'] ?>" alt="<?= $item['name'] ?>">
                            <!-- <p><?= htmlspecialchars($item['name']) ?> - $<?= number_format($item['price'], 2) ?></p> -->
                            <p>
                                <?= htmlspecialchars($item['name']) ?> - 
                                $<span class="item-total" id="item-total-<?= $item['item_id'] ?>">
                                    <?= number_format($item['price'], 2) ?>
                                </span>
                            </p>
                            <div class="right-half">
                                <!-- <label for="quantity-<?= $item['item_id'] ?>">Quantity:</label> -->
                                <input type="number" id="quantity-<?= $item['item_id'] ?>" class="quantity-input" data-id="<?= $item['item_id'] ?>" value="<?= $item['quantity'] ?? 1 ?>" min="1">
                                
                                <!-- <label for="size-<?= $item['item_id'] ?>">Size:</label> -->
                                <select id="size-<?= $item['item_id'] ?>" class="size-select" data-id="<?= $item['item_id'] ?>">
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                </select>
                                
                                <!-- <label for="color-<?= $item['item_id'] ?>">Color:</label>
                                <select id="color-<?= $item['item_id'] ?>" class="color-select" data-id="<?= $item['item_id'] ?>">
                                    <option value="red">Red</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                </select> -->
                                
                                <button class="remove-button" data-id="<?= $item['item_id'] ?>">
                                    <img src="./resources/trash-ico.png" alt="">
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div id="checkout">
            <h2>Total Price: <span>$</span><span id="total-price">0.00</span></h2>
            <!-- Payment Form -->
            <form id="payment-form" method="POST">
                <label for="payment_method">Payment Method</label>
                <br>
                <select name="payment_method" id = "payment_method" required>
                    <option value="cash">Cash On Delivery</option>
                    <option value="credit">GCash</option>
                </select>
                <br>
                <button type="button" id="checkout-button">Checkout</button>
            </form>
        </div>
    </div>
    <div id="thank-you-backdrop"></div>
    <div id="thank-you-message">
        <h2>Thank you for your purchase!</h2>
    </div>
    <script>
        $(document).ready(function () {
            // Update total price dynamically
            // $('.item-checkbox').on('change', function () {
            //     let total = 0;
            //     $('.item-checkbox:checked').each(function () {
            //         const price = parseFloat($(this).closest('.carts').data('price'));
            //         total += price;
            //     });
            //     $('#total-price').text(total.toFixed(2));
            // });
            

            // Handle checkout button click
            $('#checkout-button').on('click', function () {
                const selectedItems = [];
                $('.item-checkbox:checked').each(function () {
                    selectedItems.push($(this).closest('.carts').data('id'));
                });

                if (selectedItems.length > 0) {
                    const paymentMethod = $('#payment_method').val(); // Get the selected payment method

                    // Customize the thank-you message based on the payment method
                    let thankYouMessage = "<h2>Order Confirmation! Thank you for shopping with us!</h2>";
                    if (paymentMethod === "cash") {
                        thankYouMessage += "<p>Your purchase has been successfully processed.</p>";
                    } else if (paymentMethod === "credit") {
                        thankYouMessage += "<p>Please pay once you receive your order.</p>";
                    }

                    // Add the "Go Back To Shopping" button
                    thankYouMessage += `<button id="go-back-button" class="btn btn-primary" style = "font-family: Poppins; font-size: 2rem; padding:1rem 5rem; background-color: transparent; border-radius: 2rem; border: 1px solid black; margin-bottom: 2rem;">Go Back To Shopping</button>`;

                    // Update and display the thank-you message
                    $('#thank-you-message').html(thankYouMessage).show();
                    $('#thank-you-backdrop').show();

                    // Hide the checkout section
                    $('#checkout').hide();

                    // Redirect to Mens.php on button click
                    $('#go-back-button').on('click', function () {
                        window.location.href = 'Mens.php';
                    });
                } else {
                    alert('Please select items to checkout.');
                }
            });
            // Update quantity dynamically
            $('.quantity-input').on('change', function () {
                const itemId = $(this).data('id');
                const quantity = $(this).val();
                // You could send an AJAX request to update quantity in the database
                console.log(`Updated quantity for item ${itemId}: ${quantity}`);
            });

            // Update size dynamically
            $('.size-select').on('change', function () {
                const itemId = $(this).data('id');
                const size = $(this).val();
                // You could send an AJAX request to update size in the database
                console.log(`Updated size for item ${itemId}: ${size}`);
            });

            // Update color dynamically
            $('.color-select').on('change', function () {
                const itemId = $(this).data('id');
                const color = $(this).val();
                // You could send an AJAX request to update color in the database
                console.log(`Updated color for item ${itemId}: ${color}`);
            });

            // Remove item from cart
            $('.remove-button').on('click', function () {
                const itemId = $(this).data('id');
                // You could send an AJAX request to remove the item from the database
                $(this).closest('.carts').remove();
                console.log(`Removed item ${itemId}`);
                // Optionally recalculate total price
            });

            //update total price
            function updateTotalPrice() {
                let total = 0;
                $('.item-checkbox:checked').each(function () {
                    const item = $(this).closest('.carts');
                    const price = parseFloat(item.data('price'));
                    const quantity = parseInt(item.find('.quantity-input').val()) || 1;
                    total += price * quantity;
                });
                $('#total-price').text(total.toFixed(2));
            }

            // Update item total and recalculate total price when quantity changes
            $('.quantity-input').on('change', function () {
                const item = $(this).closest('.carts');
                const price = parseFloat(item.data('price'));
                const quantity = parseInt($(this).val()) || 1;

                // Update item total price
                item.find('.item-total').text((price * quantity).toFixed(2));

                // Recalculate total price
                updateTotalPrice();
            });

            // Update total price dynamically when checkbox is toggled
            $('.item-checkbox').on('change', updateTotalPrice);

            // Update total price initially
            updateTotalPrice();

            $('.remove-button').on('click', function () {
                const itemId = $(this).data('id');
                const cartItem = $(this).closest('.carts');
                $.ajax({
                    url: 'delete_item.php',
                    type: 'POST',
                    data: { item_id: itemId },
                    success: function (response) {
                        const data = JSON.parse(response);
                        if (data.success) {
                            // Remove the item from the DOM
                            cartItem.remove();
                            console.log(`Removed item ${itemId}`);
                            // Optionally recalculate total price
                            updateTotalPrice();
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function () {
                        alert('Failed to remove item. Please try again.');
                    }
                });
            });

        });
    </script>
</body>
</html>