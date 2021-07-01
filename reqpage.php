<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section class="navbar">
    <?php
        if(isset($_SESSION["hospitalid"])){
            echo "<button onclick='abg()' id='nav'>LOGOUT</button>
            <script>
                function abg() {
                  window.location.href = './includes/h-logout.inc.php';
                }
            </script>";
        }
        else{
            echo "<button onclick='abg()' id='nav'>LOGIN</button>
            <script>
                function abg() {
                  window.location.href = './h-login.php';
                }
            </script>";
        }
        ?>
        <!--<button onclick="register()" class="register">REGISTER</button>
        <script>
            function register() {
              window.location.href = "./h-register.php";
            }
        </script>-->
    </section>  
    <div class="dashboard">        
        <label class="heading">ADD BLOOD INFO</label><br>
        <form class="box" action="./includes/addbinfo.inc.php" method="POST">
            <button type="submit" class="bginfo" name="o+">O+</button>
            <button type="submit" class="bginfo" name="o-">O-</button>
            <button type="submit" class="bginfo" name="a+">A+</button>
            <button type="submit" class="bginfo" name="a-">A-</button>
            <button type="submit" class="bginfo" name="b+">B+</button>
            <button type="submit" class="bginfo" name="b-">B-</button>
            <button type="submit" class="bginfo" name="ab+">AB+</button>
            <button type="submit" class="bginfo" name="ab-">AB-</button>
        </form>
        <form action="./includes/reqpage.inc.php" method="POST">
            <label class="heading">REQUESTS</label>
            <?php
                include './includes/dbh.inc.php';
                $sql = "SELECT requestRName, requestREmail, requestRBg FROM request";
                $sqldata = mysqli_query($conn, $sql);

                echo "<table class='tableabg'>";
                echo "<tr><th>Hospital Name</th><th>Email Address</th><th>Blood Group</th></tr>";

                while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
                    echo "<tr><td>";
                    echo $row["requestRName"];
                    echo "</td><td>";
                    echo $row["requestREmail"];
                    echo "</td><td>";
                    echo $row["requestRBg"];
                    echo "</td><td>";
                    echo "<button type='reqsam' name='reqsam' class='accsub'>ACCEPT</button>";
                    echo "<button type='reqsam' name='reqsam' class='decsub'>DECLINE</button>";
                    echo "</td></tr>";
                }
                echo "</table>";
            ?>
        </form>
    </div>
</body>
</html>