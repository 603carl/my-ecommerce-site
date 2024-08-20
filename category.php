<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster - Category Products</title>
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
    <div class="category-detail">
        <?php
        if (isset($_GET['id'])) {
            $category_id = intval($_GET['id']);
            $sql = "SELECT name, description FROM categories WHERE id = $category_id"; 
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $category = $result->fetch_assoc();
                
                echo "<h2>" . htmlspecialchars($category['name']) . "</h2>";
                
                if (!empty($category['description'])) {
                    echo "<p>" . htmlspecialchars($category['description']) . "</p>";
                } else {
                    echo "<p>No description available for this category.</p>";
                }

                echo "<div class='products'>";
                
                $product_sql = "SELECT * FROM products WHERE category_id = $category_id";
                $product_result = $conn->query($product_sql);

                if ($product_result->num_rows > 0) {
                    while ($product = $product_result->fetch_assoc()) {
                        echo "<div class='product'>";
                        
                        if (isset($product['image']) && !empty($product['image'])) {
                            echo "<img src='images/" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "'>";
                        } else {
                            echo "<img src='images/default-product.jpg' alt='" . htmlspecialchars($product['name']) . "'>"; // Default image
                        }

                        echo "<h3>" . htmlspecialchars($product['name']) . "</h3>";

                        if (isset($product['description']) && !empty($product['description'])) {
                            echo "<p>" . htmlspecialchars($product['description']) . "</p>";
                        } else {
                            echo "<p>No description available.</p>";
                        }

                        if (isset($product['price']) && !empty($product['price'])) {
                            echo "<p class='price'>$" . htmlspecialchars($product['price']) . "</p>";
                        } else {
                            echo "<p class='price'>Price not available.</p>";
                        }

                        echo "<a href='product.php?id=" . intval($product['id']) . "' class='btn'>View Details</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No products available in this category.</p>";
                }
                
                echo "</div>";
            } else {
                echo "<p>Category not found.</p>";
            }
        } else {
            echo "<p>No category ID provided.</p>";
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 ShopMaster. All Rights Reserved.</p>
</footer>

</body>
</html>
