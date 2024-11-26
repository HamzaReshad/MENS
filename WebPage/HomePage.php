<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/HomePage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Cinzel+Decorative:wght@400;700;900&family=GFS+Didot&family=Lobster&family=Noto+Sans+JP:wght@100..900&family=Oswald:wght@200..700&family=Pacifico&family=Qwitcher+Grypen:wght@400;700&display=swap" rel="stylesheet">
    <title>M.E.N.S</title>
</head>

<body>
    <header>
        <div class="logo">
            <h1>M.E.N.S</h1>
        </div>
        <nav>
            </div>
            <ul>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li><a href="#"><?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
            <div class="buttons">
                <a href="Shop.php" class="shop_btn">Shop</a>
                <?php if (!isset($_SESSION['username'])) : ?>
                    <a href="SignUp.html" class="join_btn">Sign up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>




    <section class="hero">
        <div class="container">
            <div class="hero_text">
                <h1>Elevate Your Style with Our Essentials</h1>
            </div>
            <div class="content">
                <p>Discover a curated collection of men's essentials designed to enhance your wardrobe and elevate your confidence. From sophisticated suits to timeless accessories, we have everything you need to make a lasting impression.</p>
                <a href="shop.php?category_id=1" class="shop_btn">Shop</a>
            </div>
        </div>


        <div class="hero_banner">
            <img src="../Assets/banner.png" alt="">
        </div>
    </section>



    <section class="promo">
        <div class="container">
            <div class="promo_header">
                <h1>This Season's Must-Have Watches</h1>
            </div>
            <div class="content">
                <p>Discover our exclusive collection of watches that blend style and functionality. Each timepiece is crafted with precision, ensuring you not only look good but also stay punctual. Elevate your accessory game with a watch that speaks to your unique taste.</p>
                <a href="shop.php?category_id=4" class="shop_btn">Shop</a>
            </div>
        </div>

        <div class="hero_banner">
            <img src="../Assets/watches.png" alt="">
        </div>
    </section>

    <section class="description">
        <div class="header">
            <h3>Discover The Best in Men's <br>Essentials</h3>
            <p>Our collection combines style and functionality, ensuring you look your best for any occasion. <br> Elevate your wardrobe with our carefully curated selection.</p>
        </div>
        <div class="desc_column">
            <div class="desc_row">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter">
                    <path d="m21.406 6.086-9-4a1.001 1.001 0 0 0-.813 0l-9 4c-.02.009-.034.024-.054.035-.028.014-.058.023-.084.04-.022.015-.039.034-.06.05a.87.87 0 0 0-.19.194c-.02.028-.041.053-.059.081a1.119 1.119 0 0 0-.076.165c-.009.027-.023.052-.031.079A1.013 1.013 0 0 0 2 7v10c0 .396.232.753.594.914l9 4c.13.058.268.086.406.086a.997.997 0 0 0 .402-.096l.004.01 9-4A.999.999 0 0 0 22 17V7a.999.999 0 0 0-.594-.914zM12 4.095 18.538 7 12 9.905l-1.308-.581L5.463 7 12 4.095zm1 15.366V11.65l7-3.111v7.812l-7 3.11z"></path>
                </svg>
                <h3>Superior Quality Materials For Lastin Durability</h3>
                <p>We source only the finest materials to create products that stand the test of time.</p>
            </div>
            <div class="desc_row">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter">
                    <path d="m21.406 6.086-9-4a1.001 1.001 0 0 0-.813 0l-9 4c-.02.009-.034.024-.054.035-.028.014-.058.023-.084.04-.022.015-.039.034-.06.05a.87.87 0 0 0-.19.194c-.02.028-.041.053-.059.081a1.119 1.119 0 0 0-.076.165c-.009.027-.023.052-.031.079A1.013 1.013 0 0 0 2 7v10c0 .396.232.753.594.914l9 4c.13.058.268.086.406.086a.997.997 0 0 0 .402-.096l.004.01 9-4A.999.999 0 0 0 22 17V7a.999.999 0 0 0-.594-.914zM12 4.095 18.538 7 12 9.905l-1.308-.581L5.463 7 12 4.095zm1 15.366V11.65l7-3.111v7.812l-7 3.11z"></path>
                </svg>
                <h3>Timeless Designs That Never Go Out of Style</h3>
                <p>Our designs are crafted to remain classic and stylish, ensuring you always make a statement.</p>
            </div>
            <div class="desc_row">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter">
                    <path d="m21.406 6.086-9-4a1.001 1.001 0 0 0-.813 0l-9 4c-.02.009-.034.024-.054.035-.028.014-.058.023-.084.04-.022.015-.039.034-.06.05a.87.87 0 0 0-.19.194c-.02.028-.041.053-.059.081a1.119 1.119 0 0 0-.076.165c-.009.027-.023.052-.031.079A1.013 1.013 0 0 0 2 7v10c0 .396.232.753.594.914l9 4c.13.058.268.086.406.086a.997.997 0 0 0 .402-.096l.004.01 9-4A.999.999 0 0 0 22 17V7a.999.999 0 0 0-.594-.914zM12 4.095 18.538 7 12 9.905l-1.308-.581L5.463 7 12 4.095zm1 15.366V11.65l7-3.111v7.812l-7 3.11z"></path>
                </svg>
                <h3>Affordable Luxury for Every Man</h3>
                <p>Experience luxury without breaking the bank with our competitively priced essentials.</p>
            </div>
        </div>
        <a href="Shop.php" class="shop_btn">Shop</a>
    </section>
    <section class="product">
        <div class="product_header">
            <h3>Product Showcase</h3>
            <p>Discover our essentials in stylish settings.</p>
        </div>
        <div class="product_slider swiper">
            <div class="swiper-wrapper">
                <a href="shop.php?category_id=1" class="category_item swiper-slide">
                    <img src="../Assets/suit (2).png" alt="" class="category_img">

                    <h3 class="category_name">Suits</h3>
                </a>
                <a href="shop.php?category_id=2" class="category_item swiper-slide">
                    <img src="../Assets/cologne (2).png" alt="" class="category_img">

                    <h3 class="category_name">Colognes</h3>
                </a>
                <a href="shop.php?category_id=4" class="category_item swiper-slide">
                    <img src="../Assets/Watches (2).png" alt="" class="category_img">

                    <h3 class="category_name">Watches</h3>
                </a>
                <a href="shop.php?category_id=3" class="category_item swiper-slide">
                    <img src="../Assets/SuitShoe.png" alt="" class="category_img">

                    <h3 class="category_name">Shoes</h3>
                </a>
                <a href="shop.php?category_id=5" class="category_item swiper-slide">
                    <img src="../Assets/access.png" alt="" class="category_img">

                    <h3 class="category_name">Accessories</h3>
                </a>
                </a>
                <a href="shop.php?category_id=6" class="category_item swiper-slide">
                    <img src="../Assets/Outwear.jpg" alt="" class="category_img">

                    <h3 class="category_name">Coats & Blazers</h3>
                </a>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo-newsletter">
                <div class="logo">
                    <h2>M.E.N.S</h2>
                </div>
                <p>Subscribe to our newsletter for the latest updates on products and special offers.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email here" required>
                    <button type="submit">Join</button>
                </form>
                <p class="newsletter-disclaimer">By subscribing, you consent to our <a href="#">Privacy Policy</a> and agree to receive email updates.</p>
            </div>

            <div class="footer-links">
                <div class="footer-section">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="Shop.php">Shop Now</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Blog Posts</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Connect With Us</h4>
                    <ul>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Partnerships</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">Feedback</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Social Media</h4>
                    <ul class="social-icons">
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter">
                                    <path d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"></path>
                                </svg> Facebook</a></li>
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter">
                                    <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                                    <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                    <path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path>
                                </svg> Instagram</a></li>
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter">
                                    <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
                                </svg> Twitter</a></li>
                        <!-- <li><a href="#"><img src="linkedin-icon.png" alt="LinkedIn"> LinkedIn</a></li> -->
                        <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter">
                                    <path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path>
                                </svg> YouTube</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 MENS. All rights reserved.</p>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Cookie Settings</a></li>
            </ul>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../JS_Files/Slider.js"></script>
</body>

</html>