<?php

$server = "localhost";
$username = "hamzukich";
$password = "hamzukich";
$dbname = "mens";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM products WHERE product_id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $product_name = htmlspecialchars($product['product_name']);
    $price = number_format($product['price'], 2);
    $image_url = $product['image_url'];
    $description = htmlspecialchars($product['product_description']);
    $category_id = $product['category_id'];
} else {
    echo "Product not found.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_name; ?> - Product Detail</title>
    <link rel="stylesheet" href="../CSS/product-detail.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Cinzel+Decorative:wght@400;700;900&family=GFS+Didot&family=Lobster&family=Noto+Sans+JP:wght@100..900&family=Oswald:wght@200..700&family=Pacifico&family=Qwitcher+Grypen:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>


    <header class="header">
        <div class="header-container">
            <div class="logo">
                <h1>M.E.N.S</a></h1>
            </div>
            <nav>
                <ul class="navigation-links">
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="shop.php?category_id=<?php echo $category_id; ?>">Similar Products</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <a href="User_Cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter">
                        <path d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921zM17.307 15h-6.64l-2.5-6h11.39l-2.25 6z"></path>
                        <circle cx="10.5" cy="19.5" r="1.5"></circle>
                        <circle cx="17.5" cy="19.5" r="1.5"></circle>
                    </svg>
                </a>
            </div>
        </div>
    </header>


    <section class="product-detail">
        <div class="product-detail-container">

            <div class="product-detail-image">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $product_name; ?>">
            </div>


            <div class="product-detail-info">
                <h1><?php echo $product_name; ?></h1>
                <p class="product-price">$<?php echo $price; ?></p>
                <p class="product-description"><?php echo $description; ?></p>
                <div class="buttons">
                    <form action="add_to_cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <button type="button" class="cart-btn" data-product-id="<?php echo $product_id; ?>">Add to Cart</button>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <div id="cart-modal" class="modal hide">
        <div class="tick">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="100" viewBox="0,0,256,256">
                <g fill="#0dfb00" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <g transform="scale(9.84615,9.84615)">
                        <path d="M13,1c-6.61719,0 -12,5.38281 -12,12c0,6.61719 5.38281,12 12,12c6.61719,0 12,-5.38281 12,-12c0,-6.61719 -5.38281,-12 -12,-12zM13,3c5.53516,0 10,4.46484 10,10c0,5.53516 -4.46484,10 -10,10c-5.53516,0 -10,-4.46484 -10,-10c0,-5.53516 4.46484,-10 10,-10zM17.1875,7.0625c-0.14844,0.02344 -0.27344,0.10156 -0.375,0.25l-4.90625,7.28125l-2.3125,-2.28125c-0.19922,-0.30078 -0.58203,-0.32422 -0.78125,-0.125l-0.90625,0.90625c-0.19922,0.30078 -0.19922,0.70703 0,0.90625l3.5,3.5c0.19922,0.10156 0.48047,0.3125 0.78125,0.3125c0.19922,0 0.51953,-0.10547 0.71875,-0.40625l6,-8.8125c0.19922,-0.30078 0.08594,-0.58203 -0.3125,-0.78125l-1,-0.71875c-0.10156,-0.05078 -0.25781,-0.05469 -0.40625,-0.03125z"></path>
                    </g>
                </g>
            </svg>
        </div>
        <div class="tick-word">
            <p>Added To Cart</p>
        </div>
    </div>


    <div id="login-modal" class="modal hide">
        <div class="tick">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 0, 0, 1);transform: msFilter">
                <path d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path>
            </svg>
        </div>
        <div class="tick-word">
            <p>User Not Logged In</p>
        </div>
    </div>


    <footer>
        <p>&copy; 2024 M.E.N.S Hub. All rights reserved.</p>
    </footer>

</body>
<script src="../JS_Files/Cart.js"></script>

</html>