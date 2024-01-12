<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "functions.php";
    require_once "dbh.php";
    require_once "db-functions.php";

    $cart_id = $_POST['cart_id'];

    // Call the function to delete the item by ID
    deleteCartItem($conn, $cart_id);

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
} else {
    // Handle the case where the form was not submitted
    echo "Invalid request";
}
?>
