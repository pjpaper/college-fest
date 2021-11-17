<?php

$error = false;
$success = false;
$errormsg = "";

$servername = "localhost";
$passwordM = "";
$username = "root";
$database = "project";

$conn = mysqli_connect($servername, $username, $passwordM, $database);

$emailL = $_POST['emailL'];
$passwordL = $_POST['passwordL'];

$sql = "SELECT * FROM participants WHERE email = '$emailL' AND password = '$passwordL'";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if ($num == 1){
    $success = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $emailL;
    header("location: welcome.php");
}else{
    $error = true;
    $errormsg = "invalid credentials";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>REGISTER</title>

    <div class="header" >
        <div class="stars"></div>
        <div class="twinkling"></div>
        <div class="clouds"></div>
    </div>


    <link rel="stylesheet" href="Register_.css">

</head>
<body>

    <div class="home">
        <a href="index.html"><img src="res/icons8-home-30.png" alt="home"></a>
    </div>

    <div class="registerBox">
        <h2><u>LOGIN</u></h2>
        <?php
        if ($error == true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$errormsg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <form class="register" action="loginH.php" method="post">
            <div class="register1">

                <div>
                    <label class = "title" for="email">EMAIL ID</label><br>
                    <input required placeholder="Your Email" type="email" id ="email" name="emailL">
                </div>
                <div>
                    <label class = "title" for="password">ENTER PASSWORD</label><br>
                    <input required placeholder="Your Password" type="password" id ="password" name="passwordL">
                </div>
    
            </div>
            <input type="submit" value= "Login">
        </form>
    </div>
</body>
</html>