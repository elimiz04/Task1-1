<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart_id = $_POST['cart_id'];
    $new_quantity = $_POST['new_quantity'];

    // Call the function to edit the item quantity by ID
    editCartItemQuantity($conn, $cart_id, $new_quantity);

    exit();
} else {
    // Handle the case where the form was not submitted
    echo "Invalid request";
}
?>
