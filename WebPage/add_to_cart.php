<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$server = "localhost";
$username = "hamzukich";
$password = "hamzukich";
$dbname = "mens";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

$sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
   
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
} else {
    
    $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Product added to cart']);

} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add product to cart']);
}

$conn->close();
