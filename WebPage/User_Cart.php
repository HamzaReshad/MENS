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

$sql = "SELECT c.product_id, c.quantity, p.product_name, p.price, p.image_url FROM cart c 
        JOIN products p ON c.product_id = p.product_id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../CSS/User_Cart.css">
</head>
<body>
    <header>
        <h1>Your Cart</h1>
    </header>

    <section class="cart-section">
        <?php if ($result->num_rows > 0): ?>
            <ul class="cart-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="cart-item" data-product-id="<?php echo $row['product_id']; ?>">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['product_name']; ?>" class="product-img">
                        <div class="cart-details">
                            <h2><?php echo $row['product_name']; ?></h2>
                            <p>Price: $<?php echo number_format($row['price'], 2); ?></p>
                            <div class="quantity-controls">
                                <button class="decrease-btn" data-product-id="<?php echo $row['product_id']; ?>">-</button>
                                <span class="quantity"><?php echo $row['quantity']; ?></span>
                                <button class="increase-btn" data-product-id="<?php echo $row['product_id']; ?>">+</button>
                            </div>
                            <p>Total: $<?php echo number_format($row['price'] * $row['quantity'], 2); ?></p>
                            <button class="remove-btn" data-product-id="<?php echo $row['product_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(241, 241, 241, 1);transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg></button>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2024 M.E.N.S All rights reserved.</p>
    </footer>

    <script src="../JS_Files/User_cart.js"></script>
</body>
</html>

<?php
$conn->close();
?>
