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


$sql = "SELECT c.quantity, p.product_id, p.product_name, p.price, c.quantity 
        FROM cart c 
        JOIN products p ON c.product_id = p.product_id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$total_price = 0;

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $total_price += $row['quantity'] * $row['price'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../CSS/checkout.css">
</head>
<body>
    <h1>Checkout</h1>
    <div class="checkout-summary">
        <h2>Order Summary</h2>
        <ul>
            <?php foreach ($cart_items as $item): ?>
                <li>
                    <p><?php echo $item['product_name']; ?> - $<?php echo number_format($item['price'], 2); ?> x <?php echo $item['quantity']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <h3>Total: $<?php echo number_format($total_price, 2); ?></h3>
        <form action="checkout_process.php" method="POST">
            <button type="submit">Pay Now</button>
        </form>
    </div>
</body>
</html>
