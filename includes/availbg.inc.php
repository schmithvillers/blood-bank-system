<?php

if(isset($_POST["reqsam"])){
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';
    session_start();
    $rid = $_SESSION["receiversid"];
    $query = mysqli_query($conn,"SELECT * FROM receivers WHERE receiversId = '$rid'");
    $row = mysqli_fetch_array($query);
    $receiversName = $row["receiversName"];
    $receiversEmail = $row["receiversEmail"];
    $receiversBg = $row["receiversBg"];
    $id = $row["receiversId"];
    createRequest($conn, $receiversName, $receiversEmail, $receiversBg, $id);
}
else{
    header("location: ../availbg.php");
    exit();
}