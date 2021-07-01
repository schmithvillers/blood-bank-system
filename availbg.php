<?php
    session_start();
?>
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
        <?php
        if(isset($_SESSION["receiversid"])){
            echo "<button onclick='abg()' id='nav'>LOGOUT</button>
            <script>
                function abg() {
                  window.location.href = './includes/logout.inc.php';
                }
            </script>";
        }
        else{
            echo "<button onclick='abg()' id='nav'>LOGIN</button>
            <script>
                function abg() {
                  window.location.href = './login.php';
                }
            </script>";
        }
        ?>
        <button onclick="register()" class="register">REGISTER</button>
        <script>
            function register() {
              window.location.href = "./register.php";
            }
        </script>
    </section>  
    <div class="dashboard">
        <form action="./includes/availbg.inc.php" method="POST">
            <label class="heading">AVAILABLE BLOOD GROUPS</label>

            <?php
                include './includes/dbh.inc.php';
                $sql = "SELECT abgHBg, abgHName, abgHEmail FROM abg";
                $sqldata = mysqli_query($conn, $sql);

                echo "<table class='tableabg'>";
                echo "<tr><th>Blood Group</th><th>Hospital Name</th><th>Email Address</th></tr>";

                while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
                    echo "<tr><td>";
                    echo $row["abgHBg"];
                    echo "</td><td>";
                    echo $row["abgHName"];
                    echo "</td><td>";
                    echo $row["abgHEmail"];
                    echo "</td><td>";
                    if(isset($_SESSION['receiversid'])){
                        echo "<button type='reqsam' name='reqsam' class='reqsub'>REQUEST SAMPLE</button>";
                    }
                    else{
                        echo '';
                    }
                    echo "</td></tr>";
                }
                echo "</table>";
            ?>

            



        </form>
    </div>
</body>
</html>