<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-semibold mb-6">Your Shopping Cart</h2>
    <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="text-left p-4">Product</th>
                <th class="text-left p-4">Quantity</th>
                <th class="text-left p-4">Price</th>
                <th class="text-left p-4">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            $total = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $id => $quantity) {
                    $sql = "SELECT * FROM products WHERE id=$id";
                    $result = $conn->query($sql);
                    $product = $result->fetch_assoc();
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                    echo "<tr class='border-b'>";
                    echo "<td class='p-4'>" . $product['name'] . "</td>";
                    echo "<td class='p-4'>" . $quantity . "</td>";
                    echo "<td class='p-4'>$" . $product['price'] . "</td>";
                    echo "<td class='p-4'>$" . $subtotal . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            <tr class="bg-gray-100">
                <td colspan="3" class="text-right p-4 font-semibold">Total</td>
                <td class="p-4">$<?php echo $total; ?></td>
            </tr>
        </tbody>
    </table>
    <a href="checkout.php" class="mt-6 inline-block bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-yellow-400 transition-colors duration-300">Proceed to Checkout</a>
</div>

<?php include 'footer.php'; ?>
