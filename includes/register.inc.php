<?php

if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $emailid = $_POST["emailid"];
    $bgrp = $_POST["bgrp"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputSignup($name, $emailid, $bgrp, $pwd) != false){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if(invalidEmail($emailid) != false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if(emailExists($conn, $emailid) != false){
        header("location: ../register.php?error=accontalreadyexists");
        exit();
    }
    createUser($conn, $name, $emailid, $bgrp, $pwd); 
}
else{
    header("location: ../register.php");
    exit();
} 