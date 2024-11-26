<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../CSS/confirmation.css">
</head>
<body>
    <div class="confirmation-container">
        <h1>Thank you for your purchase!</h1>
        <p>Your order has been successfully processed. A confirmation email will be sent to you shortly.</p>
        <a href="shop.php" class="back-to-shop">Continue Shopping</a>
    </div>
</body>
</html>
