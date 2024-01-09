<?php

// Database Handler


$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "task1";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

//no closing tag because it is assumed it will close by itself as there is only php code 
//conect data from one page to another