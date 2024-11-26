<?php
$server = "localhost";
$username = "hamzukich";
$password = "hamzukich";
$dbname = "mens";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sold_products ORDER BY sale_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Products</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Sold Products</h1>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Image</th>
            <th>Quantity Sold</th>
            <th>Total Generated</th>
            <th>Sale Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['product_id'] . "</td>
                        <td><img src='" . $row['image_url'] . "' alt='Product Image'></td>
                        <td>" . $row['quantity_sold'] . "</td>
                        <td>$" . number_format($row['revenue'], 2) . "</td>
                        <td>" . $row['sale_date'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No products sold yet.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
