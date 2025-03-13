<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = $_POST['product_id'] ?? null;
    // Dummy product info – in a real app, fetch from DB
    $dummyProducts = [
        1 => ['name' => 'Laptop', 'price' => 999.99, 'image' => 'img/product01.png'],
        2 => ['name' => 'Smartphone', 'price' => 599.99, 'image' => 'img/product02.png'],
    ];
    if ($productID && isset($dummyProducts[$productID])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        // If product not in cart, initialize it
        if (!isset($_SESSION['cart'][$productID])) {
            $_SESSION['cart'][$productID] = [
                'name' => $dummyProducts[$productID]['name'],
                'price' => $dummyProducts[$productID]['price'],
                'image' => $dummyProducts[$productID]['image'],
                'quantity' => 0
            ];
        }
        // Increment quantity
        $_SESSION['cart'][$productID]['quantity'] += 1;
    }
    // Redirect or return JSON
    header('Location: cart.php');
    exit();
}
