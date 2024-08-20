<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster - Categories</title>
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

<div class="container">
    <div class="categories">
        <h2>Product Categories</h2>
        <div class="category-list">
            <?php
            $sql = "SELECT * FROM categories"; 
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<div class='category'>";

                // Check if 'image' exists before displaying it
                if (isset($row['image']) && !empty($row['image'])) {
                    echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                } else {
                    echo "<img src='images/default-category.jpg' alt='" . htmlspecialchars($row['name']) . "'>"; // Default image
                }

                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";

                // Check if 'description' exists before displaying it
                if (isset($row['description']) && !empty($row['description'])) {
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                } else {
                    echo "<p>No description available.</p>";
                }

                echo "<a href='category.php?id=" . intval($row['id']) . "' class='btn'>View Products</a>";
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
