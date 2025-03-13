<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Electro</title>
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
  <!-- Main Site Stylesheet (your existing style.css) -->
  <link type="text/css" rel="stylesheet" href="css/style.css"/>
  <!-- Optional: Page-Specific Stylesheet -->
  <link type="text/css" rel="stylesheet" href="css/about.css"/>
</head>
<body>

  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-left">
          <li><a href="tel:+021-95-51-84"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
          <li>
            <a href="mailto:email@email.com">
              <i class="fa fa-envelope-o"></i> email@email.com
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-map-marker"></i> 1734 Stonecoal Road
            </a>
          </li>
        </ul>
        <ul class="header-links pull-right">
          <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
          <!-- If user is logged in, show username; otherwise show My Account -->
          <?php if (isset($_SESSION['username'])): ?>
            <li>
              <a href="profile.php">
                <i class="fa fa-user-o"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
              </a>
            </li>
          <?php else: ?>
            <li>
              <a href="account.php">
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
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
      <div class="container">
        <div class="row">
          <!-- Logo -->
          <div class="col-md-3">
            <div class="header-logo">
              <a href="index.php" class="logo">
                <img src="./img/logo.png" alt="Electro Logo">
              </a>
            </div>
          </div>
          <!-- /Logo -->

          <!-- Search -->
          <div class="col-md-6">
            <div class="header-search">
              <form action="search.php" method="get">
                <select class="input-select" name="category">
                  <option value="0">All Categories</option>
                  <option value="1">Category 01</option>
                  <option value="2">Category 02</option>
                </select>
                <input class="input" name="query" placeholder="Search here">
                <button class="search-btn" type="submit">Search</button>
              </form>
            </div>
          </div>
          <!-- /Search -->

          <!-- Account / Cart -->
          <div class="col-md-3 clearfix">
            <div class="header-ctn">
              <!-- Wishlist -->
              <div>
                <a href="wishlist.php">
                  <i class="fa fa-heart-o"></i>
                  <span>Your Wishlist</span>
                  <div class="qty">
                    <?php echo isset($_SESSION['wishlist']) ? count($_SESSION['wishlist']) : 0; ?>
                  </div>
                </a>
              </div>
              <!-- /Wishlist -->

              <!-- Cart -->
              <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Your Cart</span>
                  <div class="qty">3</div>
                </a>
                <div class="cart-dropdown">
                  <div class="cart-list">
                    <!-- Example item -->
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
                    <!-- More items if needed -->
                  </div>
                  <div class="cart-summary">
                    <small>1 Item(s) selected</small>
                    <h5>SUBTOTAL: $980.00</h5>
                  </div>
                  <div class="cart-btns">
                    <a href="cart.php">View Cart</a>
                    <a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
              <!-- /Cart -->

              <!-- Menu Toggle (Mobile) -->
              <div class="menu-toggle">
                <a href="#">
                  <i class="fa fa-bars"></i>
                  <span>Menu</span>
                </a>
              </div>
              <!-- /Menu Toggle -->
            </div>
          </div>
          <!-- /Account / Cart -->
        </div>
      </div>
    </div>
    <!-- /MAIN HEADER -->
  </header>
  <!-- /HEADER -->

  <!-- NAVIGATION -->
  <nav id="navigation">
    <div class="container">
      <div id="responsive-nav">
        <ul class="main-nav nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="hot-deals.php">Hot Deals</a></li>
          <li><a href="categories.php">Categories</a></li>
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
            <li class="active">About Us</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /BREADCRUMB -->

  <!-- SECTION: About Page Content -->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="about-content">
            <h2>Welcome to Our Company</h2>
            <p>
              We are dedicated to providing the best service possible. Our team is composed
              of highly skilled professionals who are passionate about their work.
            </p>
            <p>
              Our mission is to deliver high-quality products that meet the needs of our
              customers. We believe in innovation, integrity, and excellence in everything we do.
            </p>
          </div>
        </div>
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
          <!-- About column -->
          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">About Us</h3>
              <p>Some information about the company.</p>
              <ul class="footer-links">
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
              </ul>
            </div>
          </div>
          <!-- /About column -->

          <!-- Categories column -->
          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Categories</h3>
              <ul class="footer-links">
                <li><a href="hot-deals.php">Hot Deals</a></li>
                <li><a href="laptops.php">Laptops</a></li>
                <li><a href="smartphones.php">Smartphones</a></li>
                <li><a href="cameras.php">Cameras</a></li>
                <li><a href="accessories.php">Accessories</a></li>
              </ul>
            </div>
          </div>
          <!-- /Categories column -->

          <!-- Info column -->
          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Information</h3>
              <ul class="footer-links">
                <li><a href="about.php">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Orders & Returns</a></li>
                <li><a href="#">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <!-- /Info column -->

          <!-- Service column -->
          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Service</h3>
              <ul class="footer-links">
                <li><a href="account.php">My Account</a></li>
                <li><a href="cart.php">View Cart</a></li>
                <li><a href="wishlist.php">Wishlist</a></li>
                <li><a href="#">Track Order</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
          </div>
          <!-- /Service column -->
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
              &copy; 2025 Electro. All Rights Reserved.
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
