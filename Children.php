<?php
    // Database connection
    $host = "localhost";
    $dbname = "login";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    // Fetch items from the database
    $stmtShoes = $pdo->prepare("SELECT * FROM items WHERE category = 'cs'");
    $stmtShoes->execute();
    $shoesItems = $stmtShoes->fetchAll(PDO::FETCH_ASSOC);

    $stmtBags = $pdo->prepare("SELECT * FROM items WHERE category = 'cb'");
    $stmtBags->execute();
    $bagsItems = $stmtBags->fetchAll(PDO::FETCH_ASSOC);

    $stmtAccessories = $pdo->prepare("SELECT * FROM items WHERE category = 'ca'");
    $stmtAccessories->execute();
    $accessoriesItems = $stmtAccessories->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mens.css">
    <title>Joseph and Kalvin</title>
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
            <a href="logout.php">LOG-OUT</a>
        </div>
    </nav>
    <main>
        
    </main>

    <div class="product-banner">

    </div>

    <div class="product-box-whole-container">
        <div class="product-box-title">
            <h1>Childrens Shoes</h1>
        </div>

        <div class="product-box" id="slider1">
            <button class="button prev" onclick="changeSlide(-1, 1)">&#10094;</button>
            <div class="slides">
            <?php foreach ($shoesItems as $item): ?>
                    <div class="slide" data-id="<?= htmlspecialchars($item['id']) ?>" data-name="<?= htmlspecialchars($item['name']) ?>" data-price="<?= htmlspecialchars($item['price']) ?>" sold-desc="<?= htmlspecialchars($item['sold_desc']) ?>" desc="<?= htmlspecialchars($item['description']) ?>">
                        <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="Product Image">
                        <div class="prod-intro">
                            <p><?= htmlspecialchars($item['name']) ?></p>
                            <h5 class="price" style="margin-bottom:0.8rem;">$<?= htmlspecialchars(number_format($item['price'], 2)) ?></h5>
                            <button onclick="openModal(this)" 
                                data-id="<?= htmlspecialchars($item['id']) ?>" 
                                data-name="<?= htmlspecialchars($item['name']) ?>" 
                                data-price="<?= htmlspecialchars($item['price']) ?>" 
                                data-sold="<?= htmlspecialchars($item['sold_desc']) ?>" 
                                data-address="<?= htmlspecialchars($item['address']) ?>" 
                                data-description="<?= htmlspecialchars($item['description']) ?>" 
                                data-image="<?= htmlspecialchars($item['image_path']) ?>" 
                                style="margin-bottom:0.8rem;">
                                Buy Item
                            </button>
                            <p><?= htmlspecialchars($item['sold_desc']) ?></p>
                            <h6><?= htmlspecialchars($item['address']) ?></h6>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="button next" onclick="changeSlide(1, 1)">&#10095;</button>
        </div>
    </div>


    <div class="second-product-banner">
        <div class="marketing-text">
            <h1> 100% off this december at Joseph and Kalvin!</h1>
        </div>
    </div>

    <div class="product-box-whole-container">
        <div class="product-box-title">
            <h1>Childrens Bag</h1>
        </div>

        <div class="product-box" id="slider2">
            <button class="button prev" onclick="changeSlide(-1, 2)">&#10094;</button>
                <div class="slides">
                <?php foreach ($bagsItems as $item): ?>
                    <div class="slide" data-id="<?= htmlspecialchars($item['id']) ?>" data-name="<?= htmlspecialchars($item['name']) ?>" data-price="<?= htmlspecialchars($item['price']) ?>" sold-desc="<?= htmlspecialchars($item['sold_desc']) ?>" desc="<?= htmlspecialchars($item['description']) ?>">
                        <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="Product Image">
                        <div class="prod-intro">
                            <p><?= htmlspecialchars($item['name']) ?></p>
                            <h5 class="price" style="margin-bottom:0.8rem;">$<?= htmlspecialchars(number_format($item['price'], 2)) ?></h5>
                            <button onclick="openModal(this)" 
                                data-id="<?= htmlspecialchars($item['id']) ?>" 
                                data-name="<?= htmlspecialchars($item['name']) ?>" 
                                data-price="<?= htmlspecialchars($item['price']) ?>" 
                                data-sold="<?= htmlspecialchars($item['sold_desc']) ?>" 
                                data-address="<?= htmlspecialchars($item['address']) ?>" 
                                data-description="<?= htmlspecialchars($item['description']) ?>" 
                                data-image="<?= htmlspecialchars($item['image_path']) ?>" 
                                style="margin-bottom:0.8rem;">
                                Buy Item
                            </button>
                            <p><?= htmlspecialchars($item['sold_desc']) ?></p>
                            <h6><?= htmlspecialchars($item['address']) ?></h6>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <button class="button next" onclick="changeSlide(1, 2)">&#10095;</button>
        </div>
    </div>

    <div class="third-product-banner">
        <div class="marketing-text">
            <!-- <h1>Free shipping to all items!</h1> -->
        </div>
    </div>


    <div class="product-box-whole-container">
        <div class="product-box-title">
            <h1>Childrens Accessories</h1>
        </div>

        <div class="product-box" id="slider3">
            <button class="button prev" onclick="changeSlide(-1, 3)">&#10094;</button>
            <div class="slides">
                <?php foreach ($accessoriesItems as $item): ?>
                    <div class="slide" data-id="<?= htmlspecialchars($item['id']) ?>" data-name="<?= htmlspecialchars($item['name']) ?>" data-price="<?= htmlspecialchars($item['price']) ?>" sold-desc="<?= htmlspecialchars($item['sold_desc']) ?>" desc="<?= htmlspecialchars($item['description']) ?>">
                        <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="Product Image">
                        <div class="prod-intro">
                            <p><?= htmlspecialchars($item['name']) ?></p>
                            <h5 class="price" style="margin-bottom:0.8rem;">$<?= htmlspecialchars(number_format($item['price'], 2)) ?></h5>
                            <button onclick="openModal(this)" 
                                data-id="<?= htmlspecialchars($item['id']) ?>" 
                                data-name="<?= htmlspecialchars($item['name']) ?>" 
                                data-price="<?= htmlspecialchars($item['price']) ?>" 
                                data-sold="<?= htmlspecialchars($item['sold_desc']) ?>" 
                                data-address="<?= htmlspecialchars($item['address']) ?>" 
                                data-description="<?= htmlspecialchars($item['description']) ?>" 
                                data-image="<?= htmlspecialchars($item['image_path']) ?>" 
                                style="margin-bottom:0.8rem;">
                                Buy Item
                            </button>
                            <p><?= htmlspecialchars($item['sold_desc']) ?></p>
                            <h6><?= htmlspecialchars($item['address']) ?></h6>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="button next" onclick="changeSlide(1, 3)">&#10095;</button>
        </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="left-modal">
                <div class="image-box">
                    <img src="" alt="Item Image">
                </div>
                <div class="form-box">
                    <h1 class="show-price">$0.00</h1>
                    <p class = "show-sold">0 sold</p>
                    <p class = "show-address">Address</p>
                </div>
            </div>
            <div class="right-modal">
                <div class="right-modal-title">
                    <h1>Item Name</h1>
                </div>
                <div class="right-modal-description">
                    <p>
                        Description goes here..
                    </p>
                    <div class="form-customize">
                        <form action="" id="customizeForm">
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="hidden" name="item_name" id="item_name">
                            <div class="grid-input">
                                <div class="left-side">
                                    <label for="color" class = "left">Color:</label>
                                    <input type="text" name="color" id="color" placeholder="Color" required class = "right" style = "width:5rem; margin-left: 1rem;">
                                </div>
                                <div class="right-side">
                                    <label for="quantity" class = "left">Qty:</label>
                                    <input type="number" name="quantity" id="quantity" min="1" placeholder="Qty" required class = "right" style = "width:5rem; margin-left: 1rem;"  >
                                </div>
                                <div class="bottom-left-side">
                                    <label for="size" class = "left">Size:</label>
                                    <select name="size" id="size" required  class = "right">
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                    </select>
                                </div>
                            </div>
                            <div class="desc-buttons">
                                <button type="submit">Add to Cart</button>
                                <button onclick="closeModal()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <button onclick="closeModal()">Cancel</button> -->
        </div>
    </div>


    <script>
        function changeSlide(direction, sliderIndex) {
            const slides = document.querySelectorAll(`#slider${sliderIndex} .slide`);
            const totalSlides = slides.length;
            const slideWidth = slides[0].offsetWidth;
            const slidesContainer = document.querySelector(`#slider${sliderIndex} .slides`);

            let currentSlide = parseInt(slidesContainer.dataset.currentSlide || '0', 10);

            currentSlide += direction;

            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }

            slidesContainer.dataset.currentSlide = currentSlide;

            const offset = currentSlide * slideWidth;
            slidesContainer.style.transform = `translateX(-${offset}px)`;
        }

        //Modal modeski
        const modal = document.getElementById('modal');
        const form = document.getElementById('customizeForm');

        function openModal(button) {
            // Fetch item details from data attributes
            const itemId = button.dataset.id;
            const itemName = button.dataset.name;
            const itemPrice = button.dataset.price;
            const itemSold = button.dataset.sold;
            const itemAddress = button.dataset.address;
            const itemDescription = button.dataset.description;
            const itemImage = button.dataset.image;

            // Populate the modal with item details
            document.getElementById('item_id').value = itemId; // Hidden input
            document.getElementById('item_name').value = itemName; // Hidden input

            // Update visible modal content
            document.querySelector('.image-box img').src = itemImage; // Update image
            document.querySelector('.show-price').textContent = `$${parseFloat(itemPrice).toFixed(2)}`; // Update price may dollar here
            document.querySelector('.show-sold').textContent = `${itemSold}`; // Update sold description
            document.querySelector('.show-address').textContent = `${itemAddress}`; // Update address
            document.querySelector('.right-modal-description p').textContent = `${itemDescription}`; // Update description

            // Show the modal
            modal.classList.add('active');
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(form);

            try {
                const response = await fetch('submit_customization.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                alert(result.message);

                if (result.message === 'Item added to cart successfully!') {
                    window.location.href = 'mens.php'; // Redirect to the cart page
                }
            } catch (error) {
                alert('Failed to add item to cart.');
            }
        });
    </script>

</body>
</html>