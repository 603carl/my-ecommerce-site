<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopMaster - Your Ultimate Online Shopping Destination</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-blue-600 shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-6">
            <div class="text-white text-2xl font-bold">ShopMaster</div>
            <nav>
                <ul class="flex space-x-6 text-white">
                    <li><a href="index.php" class="hover:text-yellow-400">Home</a></li>
                    <li><a href="categories.php" class="hover:text-yellow-400">Categories</a></li>
                    <li><a href="cart.php" class="hover:text-yellow-400"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                    <li><a href="checkout.php" class="hover:text-yellow-400">Checkout</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><span class="hover:text-yellow-400">Hello, <?php echo $_SESSION['user_name']; ?></span></li>
                        <li><a href="logout.php" class="hover:text-yellow-400">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="hover:text-yellow-400">Login</a></li>
                        <li><a href="signup.php" class="hover:text-yellow-400">Sign Up</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
