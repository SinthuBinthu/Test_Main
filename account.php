<?php
session_start();

// If not logged in → go to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} else {
    // If already logged in → go to index page
    header("Location: index.php");
    exit();
}