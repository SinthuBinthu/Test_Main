<?php
// If you really have no server or PHP processing, you can remove these tags entirely
// and rename this file to register.html. For now, we'll keep the .php extension.
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Registrierung</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS (CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

  <!-- Externes CSS für Registrierung -->
  <link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="register-wrapper">
  <div class="register-card card shadow-sm">
    <div class="card-body">
      <h2 class="card-title mb-4">Registrierung</h2>
      
      <form id="registerForm">
        <div class="mb-3">
          <label for="username" class="form-label">Benutzername</label>
          <input
            type="text"
            class="form-control"
            name="username"
            id="username"
            placeholder="Wähle einen Benutzernamen"
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

      <!-- "Zurück zum Login" Button -->
      <div class="d-grid gap-2 mt-3">
        <!-- Ändere "login.php" falls du eine andere Datei hast -->
        <a href="login.php" class="btn btn-secondary">Zurück zum Login</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Handle form submission in JavaScript
  const form = document.getElementById('registerForm');
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Verhindert das Neuladen der Seite
    
    const username = document.getElementById('username').value.trim();
    const email    = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    
    if (!username || !email || !password) {
      alert("Bitte alle Felder ausfüllen.");
      return;
    }
    
    // Zeigt die Benutzerdaten in einem Popup
    alert(
      "Hallo " + username + "!\n\n" +
      "Dein Passwort: " + password + "\n" +
      "Deine E-Mail: " + email
    );
    
    // Optional: Leert die Felder
    form.reset();
  });
</script>
</body>
</html>
