<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST["password"];
    $email = $_POST["email"];
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];

    // Call the function to create the application
    createApplication($conn, $email, $password, $firstName, $lastName, $address, $street, $town);
} else {
    // If not submitted via POST, redirect to homepage
    header("location:  ../homepage.php");
    exit();
}
