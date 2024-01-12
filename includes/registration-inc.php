<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

// below method makes it that whenever i write $username i am making for all necessary infor for future.
if(isset($_POST)){
    $password = $_POST["password"];
    $email = $_POST["email"];
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;

    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];

    
    echo $street;
    echo $town;
    




    createApplication($conn, $password, $email, $firstName, $lastName, $address, $street, $town);
}
else{
    heade("location:  ../homepage.php");
    exit();
}

