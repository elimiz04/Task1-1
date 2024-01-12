<?php
require_once "includes/functions.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

include "includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission
    $productName = mysqli_real_escape_string($conn, $_POST['product_name']);
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];
    $totalPrice = $quantity * $price;
    $customerName = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customerEmail = mysqli_real_escape_string($conn, $_POST['customer_email']);

    // Perform database insertion using prepared statements
    $sql = "INSERT INTO checkout_info (product_name, quantity, price, total_price, customer_name, customer_email)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "siddss", $productName, $quantity, $price, $totalPrice, $customerName, $customerEmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <ul class="nav nav-tabs" id="myTabs">
            <!-- ... (unchanged) ... -->
        </ul>
<!-- Customer Tab -->
<div class="tab-pane fade" id="customer">
    <label for="customer_name">Customer Name:</label>
    <input type="text" name="customer_name" required>

    <label for="customer_email">Customer Email:</label>
    <input type="email" name="customer_email" required>

    <label for="payment_card_number">Card Number:</label>
    <input type="text" name="payment_card_number" required>

    <label for="payment_account_holder">Account Holder:</label>
    <input type="text" name="payment_account_holder" required>

    <label for="payment_cvv">CVV:</label>
    <input type="text" name="payment_cvv" required>

    <label for="payment_expiration_date">Expiration Date:</label>
    <input type="text" name="payment_expiration_date" placeholder="MM/YYYY" required>

    <!-- Add other payment input fields as needed -->
</div>


        <input type="submit" value="Submit">
    </form>
</div>

<?php include 'includes/footer.php'; ?>
