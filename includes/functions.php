<!--generic functions for application-->
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



