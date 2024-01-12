<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_name = $_POST["product_name"];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $imageLink = $_POST['imageLink'];

    echo "Post ,";
    echo "Product Name ",$product_name;
    echo " Price ",$product_price;
    echo " Quantity ",$product_quantity;
    echo " ImageLink ",$imageLink;

    addToCart($conn,$product_name,$product_quantity,$product_price,$imageLink);
}
else{
    // header("location:  ../homepage.php");
    // exit();
}

