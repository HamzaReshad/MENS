<?php



$server = "localhost";
$username = "hamzukich";
$password = "hamzukich";
$dbname = "mens";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function display_products()
{
    global $conn;
    $is_logged_in = isset($_SESSION['user_id']);

    $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
    $search_query = isset($_GET['search']) ? $_GET['search'] : '';

    if ($category_id > 0) {
        $sql = "SELECT product_id, product_name, price, image_url FROM products 
                WHERE category_id = ? AND product_name LIKE ? AND quantity > 0 
                ORDER BY RAND()";
    } else {
        $sql = "SELECT product_id, product_name, price, image_url FROM products 
                WHERE product_name LIKE ? AND quantity > 0 
                ORDER BY RAND()";
    }


    $search_term = '%' . $search_query . '%';

    $stmt = $conn->prepare($sql);


    if ($category_id > 0) {
        $stmt->bind_param("is", $category_id, $search_term);
    } else {
        $stmt->bind_param("s", $search_term);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='product-card'>
                <a href='product-detail.php?id=" . $row['product_id'] . "' class='product-link'>
                    <img src='" . $row['image_url'] . "' alt='" . htmlspecialchars($row['product_name']) . "' class='product-img'>
                    <h3 class='product-name'>" . htmlspecialchars($row['product_name']) . "</h3>
                    <p class='product-price'>$" . number_format($row['price'], 2) . "</p>
                </a>
                
                <div class='product-actions'>
                <button class='product-cart-btn' data-product-id='" . $row['product_id'] . "' data-logged-in='" . ($is_logged_in ? 'true' : 'false') . "'>

                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);'>
                            <path d='M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921zM17.307 15h-6.64l-2.5-6h11.39l-2.25 6z'></path>
                            <circle cx='10.5' cy='19.5' r='1.5'></circle>
                            <circle cx='17.5' cy='19.5' r='1.5'></circle>
                        </svg>
                    </button>
                </div>
            </div>
            ";
        }
    } else {
        echo "No products found.";
    }
}
