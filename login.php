<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Individual Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section class="navbar">
        <button onclick="hlog()" id="logtype">HOSPITAL</button>
        <script>
            function hlog() {
              window.location.href = "./h-login.php";
            }
        </script>
        <button onclick="abg()" id="nav">AVAILABLE BLOOD SAMPLE</button>
        <script>
            function abg() {
              window.location.href = "./availbg.php";
            }
        </script>
        <button onclick="register()" class="register">REGISTER</button>
        <script>
            function register() {
              window.location.href = "./register.php";
            }
        </script>
    </section>
    <section style="height: 50%;" class="login">
        <h2>Individual Login</h2>
        <form action="./includes/login.inc.php" method="POST">
            <input type="text" class="logdet" name="emailid" placeholder="Email ID">
            <input type="password" class="logdet" name="pwd" placeholder="Password">
            <button type="submit" name="submit" class="submit" >SUBMIT</button>
        </form>
        <br>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all the fields!</p>";
            }
            else if($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect Login Information!</p>";
            }
        }
        ?>
    </section>
</body>
</html>