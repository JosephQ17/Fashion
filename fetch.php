<?php
// Create a database connection
$conn = new mysqli('localhost', 'root', '', 'login');

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the category from the query string, defaulting to an empty string if not set
$category = $_GET['category'] ?? '';

// If the category is empty, return an error message
if (empty($category)) {
    echo json_encode(['error' => 'Category is required']);
    exit;
}

// Prepare the SQL statement to fetch items from the 'items' table where the category matches
$sql = "SELECT * FROM items WHERE category = ?";
$stmt = $conn->prepare($sql);

// Bind the category parameter to the query
$stmt->bind_param('s', $category);

// Execute the statement
$stmt->execute();

// Get the result of the query
$result = $stmt->get_result();

// Fetch all the rows and store them in an array
$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

// Return the items as a JSON response
echo json_encode($items);
?>
