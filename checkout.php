<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-semibold mb-6">Checkout</h2>
    <form action="process_order.php" method="post" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
            <input type="text" id="address" name="address" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600" required>
        </div>
        <div class="mb-6">
            <label for="courier" class="block text-gray-700 font-bold mb-2">Choose Courier:</label>
            <select id="courier" name="courier" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-600">
                <option value="standard">Standard</option>
                <option value="express">Express</option>
                <option value="same-day">Same-Day</option>
            </select>
        </div>
        <input type="submit" value="Place Order" class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-yellow-400 transition-colors duration-300">
    </form>
</div>

<?php include 'footer.php'; ?>
