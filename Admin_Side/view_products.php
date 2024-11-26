<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
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


$sql = "SELECT product_id, product_name, price, quantity, image_url FROM products";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products - Admin</title>
    <link rel="stylesheet" href="../CSS/view_product.css">
</head>
<body>

<h2>Admin - View Products</h2>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td>$<?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Product Image" width="50"></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>

<a href="add_products.php">Add New Product</a>

</body>
</html>
