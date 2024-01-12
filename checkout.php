<?php 
require_once "includes/functions.php";
require_once "includes/dbh.php";
require_once "includes/db-functions.php";

include "includes/header.php";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission
    $productName = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $totalPrice = $quantity * $price;
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];

    // Perform database insertion using MySQLi
    $conn = new mysqli("localhost", "your_username", "your_password", "your_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO checkout_info (product_name, quantity, price, total_price, customer_name, customer_email)
            VALUES ('$productName', $quantity, $price, $totalPrice, '$customerName', '$customerEmail')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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
            <li class="nav-item">
                <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="customer-tab" data-toggle="tab" href="#customer">Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="confirmation-tab" data-toggle="tab" href="#confirmation">Confirmation</a>
            </li>
        </ul>

        <div class="tab-content mt-2">
            <!-- Product Tab -->
            <div class="tab-pane fade show active" id="product">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" required>
                <!-- Add other product input fields here -->
            </div>

            <!-- Customer Tab -->
            <div class="tab-pane fade" id="customer">
                <label for="customer_name">Customer Name:</label>
                <input type="text" name="customer_name" required>
                <!-- Add other customer input fields here -->
            </div>

            <!-- Confirmation Tab -->
            <div class="tab-pane fade" id="confirmation">
                <!-- Add a confirmation message or summary here -->
            </div>
        </div>

        <input type="submit" value="Submit">
    </form>
</div>

<?php include 'includes/footer.php'; ?>

