<?php

function passwordsMatch($password, $confPassword ){
    $result = false; 

    if($password == $confPassword){
        $result = true;
    }

    return $result;
}

function validUsername($username){
    $result = fasle; 

    if(preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true; 
    }
    
    return $results; 
}

function validatesignInApplication($email, $password, $conn) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}





