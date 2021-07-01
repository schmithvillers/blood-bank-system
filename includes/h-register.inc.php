<?php

if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $emailid = $_POST["emailid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(hEmptyInputSignup($name, $emailid, $pwd) != false){
        header("location: ../h-register.php?error=emptyinput");
        exit();
    }
    if(hInvalidEmail($emailid) != false){
        header("location: ../h-register.php?error=invalidemail");
        exit();
    }
    if(hEmailExists($conn, $emailid) != false){
        header("location: ../h-register.php?error=accontalreadyexists");
        exit();
    }
    hCreateUser($conn, $name, $emailid, $pwd); 
}
else{
    header("location: ../h-register.php");
    exit();
} 