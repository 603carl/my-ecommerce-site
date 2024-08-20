<?php
include 'db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle error
    header("Location: login.php?error=notloggedin");
    exit();
}

$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$courier = $_POST['courier'];
$total = 0;

foreach ($_SESSION['cart'] as $id => $quantity) {
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    $subtotal = $product['price'] * $quantity;
    $total += $subtotal;
}

// Insert into orders table
$sql = "INSERT INTO orders (user_id, total, order_date) VALUES ('$user_id', '$total', NOW())";
$conn->query($sql);
$order_id = $conn->insert_id;

// Insert order items
foreach ($_SESSION['cart'] as $id => $quantity) {
    $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$id', '$quantity')";
    $conn->query($sql);
}

// Clear cart
unset($_SESSION['cart']);

// Redirect to confirmation page
header("Location: confirmation.php?order_id=$order_id");
?>
