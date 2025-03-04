<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile - Electro</title>
</head>
<body>
  <h1>Welcome to your profile, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
  <p>This is where you could show user-specific details, settings, etc.</p>

  <p><a href="index.php">Back to Home</a></p>
</body>
</html>