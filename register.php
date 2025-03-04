<?php
session_start();

// Variables to hold the submitted data
$username = '';
$email    = '';
$password = '';
$showPopup = false;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read form fields (no advanced validation here)
    $username = $_POST['username'] ?? '';
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // If all fields have some content, we'll trigger the popup
    if (!empty($username) && !empty($email) && !empty($password)) {
        $showPopup = true;
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrierung</title>
  
  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <!-- Custom CSS (similar to login.css) -->
  <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div class="register-wrapper">
  <div class="register-card card shadow-sm">
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Registrierung</h2>

      <form action="register.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Benutzername</label>
          <input
            type="text"
            class="form-control"
            name="username"
            id="username"
            placeholder="Wähle einen Benutzernamen"
            value="<?php echo htmlspecialchars($username); ?>"
          >
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-Mail</label>
          <input
            type="email"
            class="form-control"
            name="email"
            id="email"
            placeholder="Deine E-Mail"
            value="<?php echo htmlspecialchars($email); ?>"
          >
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Passwort</label>
          <input
            type="password"
            class="form-control"
            name="password"
            id="password"
            placeholder="Gib dein Passwort ein"
          >
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrieren</button>
      </form>
    </div>
  </div>
</div>

<!-- If $showPopup is true, show the JS alert with the credentials -->
<?php if ($showPopup): ?>
<script>
  alert(
    "Hallo <?php echo htmlspecialchars($username); ?>!\n\n" +
    "Dein Passwort: <?php echo htmlspecialchars($password); ?>\n" +
    "Deine E-Mail: <?php echo htmlspecialchars($email); ?>"
  );
</script>
<?php endif; ?>

<!-- Bootstrap JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
