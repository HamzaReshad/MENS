<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$server = "localhost";
$username = "hamzukich";
$password = "hamzukich";
$dbname = "mens";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $quantity = $_POST['quantity'];
    $description =$_POST['product_description'];
    $image_url = $_POST['product_image']; 

   
    $sql = "INSERT INTO products (product_name, price, quantity,product_description, image_url,category_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdissi", $product_name, $price, $quantity,$description, $image_url,$category_id);

    if ($stmt->execute()) {
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Product</title>
    <link rel="stylesheet" href="../CSS/add_product.css">
</head>
<body>

<h2>Admin - Add New Product</h2>

<?php if (isset($message)) : ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form action="add_products.php" method="POST">
    <label for="product_name">Product Name:</label>
    <input type="text" id="product_name" name="product_name" required>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
        <option value="1">Suits</option>
        <option value="2">Colognes</option>
        <option value="3">Shoes</option>
        <option value="4">Watches</option>
        <option value="5">Accessories</option>
        <option value="6">Coats & Blazers</option>
        
    </select>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>

    <label for="product_image">Product Image URL:</label>
    <input type="text" id="product_image" name="product_image" required>

    <label for="product_description">Product Description:</label>
    <textarea id="product_description" name="product_description" rows="8" cols="80"></textarea>

    <button type="submit">Add Product</button>
</form>

</body>
</html>

