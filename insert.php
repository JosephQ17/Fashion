<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Items</title>
    <style>
        /* body > *{
            border: 2px solid green;
            box-sizing: border-box;
            padding-bottom: 20px;
            display: grid;
            justify-content: center;
        } */
        
    </style>
</head>

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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sold_desc = $_POST['sold'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $category = $_POST['category']; // Get the category from the form

    // Handle image upload
    $targetDir = "uploads/";
    $imageFile = $_FILES['image'];
    $targetFilePath = $targetDir . basename($imageFile['name']);

    if (move_uploaded_file($imageFile['tmp_name'], $targetFilePath)) {
        // Save data to database
        $stmt = $pdo->prepare("INSERT INTO items (name, price, sold_desc, address, description, category, image_path) VALUES (:name, :price, :sold_desc, :address, :description, :category, :image_path)");
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':sold_desc' => $sold_desc,
            ':address' => $address,
            ':description' => $description,
            ':category' => $category, // Insert category into the database
            ':image_path' => $targetFilePath
        ]);

        echo "Item added successfully!";
    } else {
        echo "Failed to upload the image.";
    }
}
?>
<body>
    <div class="mens-shoes">
        <h1>Mens Shoes</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" step="0.01" required><br><br>
            <label for="sold_desc">Sold:</label><br>
            <input type="text" id="sold_desc" name="sold"><br><br>
            <label for="address">Address:</label><br>
            <textarea id="address" name="address" required></textarea><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea><br><br>
            
            <!-- New category dropdown -->
            <label for="category">Category:</label><br>
            <select name="category" id="category" required>
                <option value="ms">MS</option>
                <option value="mb">MB</option>
                <option value="ma">MA</option>
                <option value="ws">WS</option>
                <option value="wb">WB</option>
                <option value="wa">WA</option>
                <option value="cs">CS</option>
                <option value="cb">CB</option>
                <option value="ca">CA</option>
            </select><br><br>

            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
