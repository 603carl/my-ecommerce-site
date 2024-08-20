<?php
session_start();
$id = $_GET['id'];
if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = 1;
} else {
    $_SESSION['cart'][$id]++;
}
header("Location: cart.php");
?>
