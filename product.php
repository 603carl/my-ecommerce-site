<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster - Product Details</title>
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
    <div class="product-detail">
        <?php
        if (isset($_GET['id'])) {
            $product_id = intval($_GET['id']);
            $sql = "SELECT * FROM products WHERE id = $product_id"; 
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                echo "<div class='product'>";
                
                // Check if 'image' exists before displaying it
                if (isset($row['image']) && !empty($row['image'])) {
                    echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                } else {
                    echo "<img src='images/default-product.jpg' alt='" . htmlspecialchars($row['name']) . "'>"; // Default image
                }

                echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";

                // Check if 'description' exists before displaying it
                if (isset($row['description']) && !empty($row['description'])) {
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                } else {
                    echo "<p>No description available.</p>";
                }

                // Check if 'price' exists before displaying it
                if (isset($row['price']) && !empty($row['price'])) {
                    echo "<p class='price'>$" . htmlspecialchars($row['price']) . "</p>";
                } else {
                    echo "<p class='price'>Price not available.</p>";
                }

                echo "<a href='add_to_cart.php?id=" . intval($row['id']) . "' class='btn'>Add to Cart</a>";
                echo "</div>";
            } else {
                echo "<p>Product not found.</p>";
            }
        } else {
            echo "<p>No product ID provided.</p>";
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 ShopMaster. All Rights Reserved.</p>
</footer>

</body>
</html>
