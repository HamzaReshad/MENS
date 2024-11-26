<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$server = "localhost";
$username = "hamzukich";
$password = "hamzukich";
$dbname = "mens";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->begin_transaction();


$sql = "SELECT c.quantity as user_quantity, p.product_id, p.quantity as total_quantity, p.price, p.image_url 
        FROM cart c 
        JOIN products p ON c.product_id = p.product_id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$total_amount = 0;


$sold_sql = "INSERT INTO sold_products (product_id, image_url, quantity_sold, revenue) 
             VALUES (?, ?, ?, ?)";
$sold_stmt = $conn->prepare($sold_sql);

while ($row = $result->fetch_assoc()) {
    $new_quantity = $row['total_quantity'] - $row['user_quantity'];

    if ($new_quantity < 0) {
        $conn->rollback();
        echo "Error: Not enough stock for product ID " . $row['product_id'];
        exit();
    }


    $update_sql = "UPDATE products SET quantity = ? WHERE product_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ii", $new_quantity, $row['product_id']);
    $update_stmt->execute();


    $total_generated = $row['user_quantity'] * $row['price'];
    $total_amount += $total_generated;


    $sold_stmt->bind_param("isid", $row['product_id'], $row['image_url'], $row['user_quantity'], $total_generated);
    $sold_stmt->execute();
}


$clear_cart_sql = "DELETE FROM cart WHERE user_id = ?";
$clear_cart_stmt = $conn->prepare($clear_cart_sql);
$clear_cart_stmt->bind_param("i", $user_id);
$clear_cart_stmt->execute();


$conn->commit();
$conn->close();


header("Location: order_confirmation.php?amount=" . $total_amount);
exit();
