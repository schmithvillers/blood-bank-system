<?php

if(isset($_POST["submit"])){
    $emailid = $_POST["emailid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if(emptyInputLogin($emailid, $pwd) != false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $emailid, $pwd);
}
else{
    header("location: ../login.php");
    exit();
}