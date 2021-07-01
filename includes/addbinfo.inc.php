<?php

require_once 'dbh.inc.php';
require_once 'function.inc.php';
session_start();
$hid = $_SESSION["hospitalid"];

if(isset($_POST["o+"])){
    $bg = "O+"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
if(isset($_POST["o-"])){
    $bg = "O-"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
if(isset($_POST["a+"])){
    $bg = "A+"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
if(isset($_POST["a-"])){
    $bg = "A-"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
if(isset($_POST["b+"])){
    $bg = "B+"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
if(isset($_POST["b-"])){
    $bg = "B-"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
if(isset($_POST["ab+"])){
    $bg = "AB+"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
if(isset($_POST["ab-"])){
    $bg = "AB-"; 
    $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospitalId = '$hid'");
    $row = mysqli_fetch_array($query);
    $hospitalName = $row["hospitalName"];
    $hospitalEmail = $row["hospitalEmail"];
    $hospitalId = $row["hospitalId"];
    createAvail($conn, $bg, $hospitalName, $hospitalEmail, $hospitalId);
}
else{
    header("location: ../reqpage.php");
    exit();
}