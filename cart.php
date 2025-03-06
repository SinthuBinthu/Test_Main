<?php
session_start();

// If a removal request is sent, remove the product from the cart
if (isset($_GET['remove_from_cart'])) {
    $product_id = (int) $_GET['remove_from_cart'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
    // Redirect to refresh the cart page
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart - Electro</title>
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
  <!-- Main Site Stylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css"/>
  <!-- Optional: Page-Specific Stylesheet -->
  <link type="text/css" rel="stylesheet" href="css/cart.css"/>
</head>
<body>

  <!-- HEADER -->
  <?php include('header.php'); ?>
  <!-- /HEADER -->

  <!-- NAVIGATION -->
  <?php include('navigation.php'); ?>
  <!-- /NAVIGATION -->

  <!-- BREADCRUMB -->
  <div id="breadcrumb" class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb-tree">
            <li><a href="index.php">Home</a></li>
            <li class="active">Your Cart</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /BREADCRUMB -->

  <!-- SECTION: Cart Page Content -->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-content">
            <h2>Your Cart</h2>
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  foreach ($_SESSION['cart'] as $product_id => $product):
                    $subtotal = $product['price'] * $product['quantity'];
                    $total += $subtotal;
                  ?>
                    <tr>
                      <td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="50"></td>
                      <td><?php echo $product['name']; ?></td>
                      <td>$<?php echo number_format($product['price'], 2); ?></td>
                      <td><?php echo $product['quantity']; ?></td>
                      <td>$<?php echo number_format($subtotal, 2); ?></td>
                      <td><a href="cart.php?remove_from_cart=<?php echo $product_id; ?>" class="btn btn-danger">Remove</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <div class="cart-summary">
                <h3>Total: $<?php echo number_format($total, 2); ?></h3>
                <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
              </div>
            <?php else: ?>
              <p>Your cart is empty.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /SECTION -->

  <!-- FOOTER -->
  <?php include('footer.php'); ?>
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
