<?php
session_start();

// Initialize wishlist if not already set
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Dummy product data (replace with your database query in a real application)
$products = [
    1 => ['name' => 'Product 1', 'price' => 980.00, 'image' => './img/product01.png'],
    2 => ['name' => 'Product 2', 'price' => 990.00, 'image' => './img/product02.png'],
    3 => ['name' => 'Product 3', 'price' => 970.00, 'image' => './img/product03.png'],
];

// Handle removal from wishlist via GET parameter
if (isset($_GET['remove_from_wishlist'])) {
    $product_id = (int)$_GET['remove_from_wishlist'];
    if (($key = array_search($product_id, $_SESSION['wishlist'])) !== false) {
        unset($_SESSION['wishlist'][$key]);
        // Re-index the array to maintain order
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
    }
    // Redirect to refresh the page after removal
    header("Location: wishlist.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro - Wunschzettel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel:+021-95-51-84"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="mailto:email@email.com">
                        <i class="fa fa-envelope-o"></i> email@email.com
                    </a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                    


                    <li class="nav-item dropdown">
                <?php if (isset($_SESSION['username'])): ?>
                    <a class="nav-link dropdown-toggle text-white" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                    style="color: #fff; text-decoration: none; padding: 10px; display: flex; align-items: center;">
                        <i class="fa fa-user-o"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown" 
                        style="background-color: #000; border-radius: 5px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); min-width: 160px;">
                        <a class="dropdown-item" href="profile.php" 
                        style="color: #fff; padding: 12px; display: flex; align-items: center; text-decoration: none;">
                            <i class="fa fa-user" style="margin-right: 10px;"></i> Mein Profil
                        </a>
                        <div class="dropdown-divider" style="background-color: rgba(255, 255, 255, 0.2); height: 1px;"></div>
                        <a class="dropdown-item" href="logout.php" 
                        style="color: #fff; padding: 12px; display: flex; align-items: center; text-decoration: none;">
                            <i class="fa fa-sign-out" style="margin-right: 10px;"></i> Logout
                        </a>
                    </div>
                <?php else: ?>
                    <a class="nav-link text-white" href="account.php">
                        <i class="fa fa-user-o"></i> My Account
                    </a>
                <?php endif; ?>
            </li>

                    
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <img src="./img/logo.png" alt="Electro Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="search.php" method="get">
                                <select class="input-select" name="category">
                                    <option value="0">Alle Kategorien</option>
                                    <option value="1">Kategorie 01</option>
                                    <option value="2">Kategorie 02</option>
                                </select>
                                <input class="input" name="query" placeholder="Suche hier">
                                <button class="search-btn" type="submit">Suchen</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <div>
                                <a href="wishlist.php">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Dein Wunschzettel</span>
                                    <div class="qty"><?php echo count($_SESSION['wishlist']); ?></div>
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Dein Warenkorb</span>
                                    <div class="qty">3</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./img/product01.png" alt="Product 1">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="product.php">Product Name</a></h3>
                                                <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./img/product02.png" alt="Product 2">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="product.php">Product Name</a></h3>
                                                <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-summary">
                                        <small>3 Artikel ausgewählt</small>
                                        <h5>SUBTOTAL: $2940.00</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="cart.php">Warenkorb ansehen</a>
                                        <a href="checkout.php">Zur Kasse <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <div class="container">
            <div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="hot-deals.php">Hot Deals</a></li>
                    <li><a href="categories.php">Kategorien</a></li>
                    <li><a href="laptops.php">Laptops</a></li>
                    <li><a href="smartphones.php">Smartphones</a></li>
                    <li><a href="cameras.php">Cameras</a></li>
                    <li><a href="accessories.php">Accessories</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Wunschzettel</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <!-- WISHLIST -->
                <div id="store" class="col-md-12">
                    <div class="row">
                        <?php if(count($_SESSION['wishlist']) > 0): ?>
                            <?php foreach ($_SESSION['wishlist'] as $product_id): ?>
                                <?php if (isset($products[$product_id])): ?>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?php echo $products[$product_id]['image']; ?>" alt="<?php echo $products[$product_id]['name']; ?>">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Kategorie</p>
                                                <h3 class="product-name">
                                                    <a href="product.php"><?php echo $products[$product_id]['name']; ?></a>
                                                </h3>
                                                <h4 class="product-price">$<?php echo number_format($products[$product_id]['price'], 2); ?></h4>
                                                <div class="product-btns">
                                                    <a href="?remove_from_wishlist=<?php echo $product_id; ?>" class="remove-from-wishlist">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="tooltipp">vom Wunschzettel entfernen</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn">
                                                    <i class="fa fa-shopping-cart"></i> in den Warenkorb
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-md-12">
                                <p>Dein Wunschzettel ist leer.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /WISHLIST -->
            </div>
        </div>
    </div>
    <!-- /SECTION -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Über uns</h3>
                            <p>Einige Informationen über das Unternehmen.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Kategorien</h3>
                            <ul class="footer-links">
                                <li><a href="#">Hot Deals</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">Über uns</a></li>
                                <li><a href="#">Kontakt</a></li>
                                <li><a href="#">Datenschutz</a></li>
                                <li><a href="#">Bestellungen &amp; Rückgaben</a></li>
                                <li><a href="#">AGB</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">Mein Konto</a></li>
                                <li><a href="#">Warenkorb ansehen</a></li>
                                <li><a href="#">Wunschzettel</a></li>
                                <li><a href="#">Bestellung verfolgen</a></li>
                                <li><a href="#">Hilfe</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="copyright">
                            &copy; 2025 Electro. Alle Rechte vorbehalten.
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
