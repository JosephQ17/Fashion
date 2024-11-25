<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die('You must be logged in to add items to the cart.');
}

include './login/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];  // Get the logged-in user's ID
    $item_id = $_POST['item_id'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];

    // Get item details from the database
    $stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->bind_param('i', $item_id);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();

    if ($item) {
        // Insert item into the user's cart
        $stmt = $conn->prepare("INSERT INTO user_cart (user_id, item_id, size, color, quantity) 
                               VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('iiisi', $user_id, $item_id, $size, $color, $quantity);
        $stmt->execute();
        echo json_encode(['message' => 'Item added to cart successfully!', 'data' => $item]);
    }
}
?>
