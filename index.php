<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster - Your Ultimate Online Shopping Destination</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="container">
        <div class="logo">ShopMaster</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                <li><a href="checkout.php">Checkout</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="hero">
    <h1>Welcome to ShopMaster</h1>
                        <p>Your ultimate online shopping destination</p>
</div>

<div class="container">
    <div class="featured-products">
        <h2>Featured Products</h2>
        <div class="products">
            <?php
            $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 8"; 
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>$" . $row['price'] . "</p>";
                echo "<a href='product.php?id=" . $row['id'] . "' class='btn'>View Details</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 ShopMaster. All Rights Reserved.</p>
</footer>

</body>
</html>
