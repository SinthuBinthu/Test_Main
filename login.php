<?php
/**
 * A minimal login script that checks a hard-coded username/password.
 * Replace this logic with your database queries when you're ready.
 */
session_start();

$error = '';

// If the form was submitted:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form fields (sanitize if needed)
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Simple validation
    if (empty($username) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        // HARDCODED CHECK (for demo). Replace with DB check.
        if ($username === 'admin' && $password === '1234') {
            // Set session variables
            $_SESSION['user_id'] = 1;  // example user ID
            $_SESSION['username'] = 'admin';
            
            // Redirect to a protected page (e.g. index.php)
            header("Location: index.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Electro</title>
  
  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  
  <!-- Custom Login CSS -->
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card card shadow-sm">
      <div class="card-body">
        <h2 class="card-title text-center mb-4">Login to Electro</h2>
        
        <?php if (!empty($error)): ?>
          <div class="alert alert-danger">
            <?php echo htmlspecialchars($error); ?>
          </div>
        <?php endif; ?>
        
        <form action="login.php" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input 
              type="text" 
              class="form-control" 
              name="username" 
              id="username" 
              placeholder="Enter username"
              required
            >
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
              type="password" 
              class="form-control" 
              name="password" 
              id="password" 
              placeholder="Enter password"
              required
            >
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
        
        <p class="mt-3 text-center">
          Don't have an account? 
          <a href="register.php">Register here</a>.
          <!-- Link to your register.php if you create one -->
        </p>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap JS (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
