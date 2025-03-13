<?php
session_start();
// If not logged in, go to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
</head>
<body>
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
  <p>This is your profile page. Add details, orders, etc.</p>
  <p><a href="index.php">Go to Homepage</a></p>
</body>
</html>