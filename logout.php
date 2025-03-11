<?php
session_start();
// Alle Session-Variablen löschen
$_SESSION = array();
// Session zerstören
session_destroy();
// Weiterleitung zur Startseite
header("Location: index.php");
exit();
?>
