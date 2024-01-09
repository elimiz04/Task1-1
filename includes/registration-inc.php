<?php

require_once "functions.php";
require_once "dbh.php";
require_once "db-functions.php";

// below method makes it that whenever i write $username i am making for all necessary infor for future.
if(isset($_POST)){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    $address = $_POST["address"];
    $street = $_POST["street"];
    $town = $_POST["town"];
    $course = $_POST["course"];

    //VALIDATION
    $passwordMatch = passwordsMatch($password, $confPassword);
    //same thing
    // if(!$passwordsMatch)
    if($passwordsMatch == false){
        header("location:../index.php?error=passwordsDoNotMatch");
        exit();
    }
    //same thing
    // if(!$passwordMatch)

    $validUsername = validUsername($username);
    if(!$validUsername){
        header("location:../index.php?error=invalidUsername");
        exit();
    }


    createApplication($conn, $username, $password, $email, $firstName, $lastName, $address, $street, $town, $course);

}
else{
    heade("location:  ../index.php");
    exit();
}

