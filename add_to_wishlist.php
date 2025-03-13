<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = $_POST['product_id'] ?? null;
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }
    if ($productID && !in_array($productID, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $productID;
    }
    header('Location: wishlist.php');
    exit();
}   