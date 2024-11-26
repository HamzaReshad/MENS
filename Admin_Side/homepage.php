<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}


$server = "localhost";
$username = "hamzukich";
$password = "hamzukich";
$dbname = "mens";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SUM(revenue) AS total_revenue FROM sold_products";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_revenue = $row['total_revenue'] ? $row['total_revenue'] : 0;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../CSS/admin_home.css">
</head>
<body>

<div class="admin-container">
    <h1>Welcome to Admin Dashboard</h1>

    <div class="admin-stats">
        <h2>Total Revenue: $<?php echo number_format($total_revenue, 2); ?></h2>
    </div>

    <div class="admin-actions">
        <a href="add_products.php" class="action-btn">Add New Product</a>
        <a href="view_products.php" class="action-btn">View All Products</a>
        <a href="sold_products.php" class="action-btn">View Sales Report</a>
    </div>
</div>

</body>
</html>
