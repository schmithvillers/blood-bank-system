<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section class="navbar">
        <button onclick="ilog()" id="logtype">INDIVIDUAL</button>
        <script>
            function ilog() {
              window.location.href = "./login.php";
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
              window.location.href = "./h-register.php";
            }
        </script>
    </section>
    <section style="height: 50%;" class="login">
        <h2>Hospital Login</h2>
        <form action="./includes/h-login.inc.php" method="POST">
            <input type="text" class="logdet" name="emailid" placeholder="Email ID">
            <input type="password" class="logdet" name="pwd" placeholder="Password">
            <button type="submit" name="submit" class="submit" >SUBMIT</button>
        </form>
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