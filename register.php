<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section class="navbar">
        <button onclick="hlog()" id="logtype">HOSPITAL</button>
        <script>
            function hlog() {
              window.location.href = "./h-register.php";
            }
        </script>
        <button onclick="abg()" id="nav">AVAILABLE BLOOD SAMPLE</button>
        <script>
            function abg() {
              window.location.href = "./availbg.php";
            }
        </script>
        <button onclick="login()" class="register">LOGIN</button>
        <script>
            function login() {
              window.location.href = "./login.php";
            }
        </script>
    </section>
    <section class="login">
        <h2>Individual Sign Up</h2>
        <form action="./includes/register.inc.php" method="post">
            <input type="text" class="logdet" name="name" placeholder="Full Name">
            <input type="text" class="logdet" name="emailid" placeholder="Email ID"><br>
            <input type="text" class="logdet" name="bgrp" placeholder="Blood Group"><br>
            <input type="password" class="logdet" name="pwd" placeholder="Create Password">
            <button type="submit" name="submit" class="submit">SUBMIT</button>
        </form>
        <br>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all the fields!</p>";
            }
            else if($_GET["error"] == "invalidEmail"){
                echo "<p>Choose a proper email address!</p>";
            }
            else if($_GET["error"] == "accontalreadyexists"){
                echo "<p>Your account already exists! Login instead.</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong</p>";
            }
        }
        ?>

    </section>

</body>
</html>