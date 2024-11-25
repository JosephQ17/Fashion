<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die('Unauthorized access');
}

include './login/connect.php';

if (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $user_id = $_SESSION['user_id'];

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM user_cart WHERE user_id = ? AND item_id = ?");
    $stmt->bind_param('ii', $user_id, $item_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Item removed successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
