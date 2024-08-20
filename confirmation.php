<?php include 'db.php'; ?>
<?php include 'header.php'; ?>

<div class="confirmation">
    <h2>Order Confirmation</h2>
    <p>Thank you for your order! Your order number is <?php echo $_GET['order_id']; ?>.</p>
    <p>We will process your order shortly and provide updates to your email.</p>
    <a href="index.php" class="btn">Continue Shopping</a>
</div>

<?php include 'footer.php'; ?>
