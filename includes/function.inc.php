<?php
// ----------------------------------- Receiver Register-------------------------------------------------
function emptyInputSignup($name, $emailid, $bgrp, $pwd){
    
    if(empty($name) || empty($emailid) || empty($bgrp) || empty($pwd)){
        $result = true; 
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($emailid){
    if(!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
        $result = true; 
    }
    else{
        $result = false;
    }
    return $result;
}
function emailExists($conn, $emailid){
    $sql = "SELECT * FROM receivers WHERE receiversEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $emailid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } 
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt); 
}
function createUser($conn, $name, $emailid, $bgrp, $pwd){
    $sql = "INSERT INTO receivers (receiversName, receiversEmail, receiversBg, receiversPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $emailid, $bgrp, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    header("location: ../availbg.php?error=none");
}
// -----------------------------------Receivers Login------------------------------------------------

function emptyInputLogin($emailid, $pwd){
    
    if(empty($emailid) || empty($pwd)){
        $result = true; 
    }
    else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $emailid, $pwd){
    $userExists = emailExists($conn, $emailid);

    if($userExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $userExists["receiversPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["receiversid"] = $userExists["receiversId"];
        header("location: ../availbg.php");
        exit();
    }
}
// -----------------------------------Hospital Register--------------------------------------------
function hEmptyInputSignup($name, $emailid, $pwd){
    
    if(empty($name) || empty($emailid) || empty($pwd)){
        $result = true; 
    }
    else{
        $result = false;
    }
    return $result;
}
function hInvalidEmail($emailid){
    if(!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
        $result = true; 
    }
    else{
        $result = false;
    }
    return $result;
}
function hEmailExists($conn, $emailid){
    $sql = "SELECT * FROM hospital WHERE hospitalEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../h-register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $emailid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } 
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt); 
}
function hCreateUser($conn, $name, $emailid, $pwd){
    $sql = "INSERT INTO hospital (hospitalName, hospitalEmail, hospitalPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../h-register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $emailid, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    header("location: ../reqpage.php?error=none");
}
// -----------------------------------Hospital Login ---------------------------------------------------
function hLoginUser($conn, $emailid, $pwd){
    $userExists = hEmailExists($conn, $emailid);

    if($userExists === false){
        header("location: ../h-login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $userExists["hospitalPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../h-login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["hospitalid"] = $userExists["hospitalId"];
        header("location: ../reqpage.php");
        exit();
    }
}

//---------------------------------------- Creating Requests------------------------

function createRequest($conn, $receiversName, $receiversEmail, $receiversBg, $id){
    $sql = "INSERT INTO request (requestRName, requestREmail, requestRBg, receiversId) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../availbg.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $receiversName, $receiversEmail, $receiversBg, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    header("location: ../availbg.php?error=none");
}
function createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId){
    $sql = "INSERT INTO abg (abgHBg, abgHName, abgHEmail, hospitalId) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../reqpage.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $bg, $hospitalName, $hospitalEmail, $hospitalId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    header("location: ../reqpage.php?error=none");
}