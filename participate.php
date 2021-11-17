<?php
$error = false;
$success = false;
$errormsg = "";
$exist = false;

$servername = "localhost";
$passwordM = "";
$username = "root";
$database = "project";

$conn = mysqli_connect($servername, $username, $passwordM, $database);


$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];
$con_password = $_POST['confirmPassword'];
$referral = $_POST['referral'];
$event = $_POST['event'];
$college = $_POST['college'];
$collegeAddress = $_POST['collegeAddress'];
$state = $_POST['collegeState'];
$branch = $_POST['branch'];


//check whether username allready existe
$existSQL = "SELECT * FROM `participants` WHERE `email` LIKE '$email'";
$result = mysqli_query($conn, $existSQL);
$rows = mysqli_num_rows($result);


if ($rows >0){
    $error = true;
    $errormsg = " email already registered";
}else{

    if ($password == $con_password){
        if ($referral = ""){
            $sql = "INSERT INTO `participants` ( `name`, `Gender`, `email`, `contact`, `password`, `event`, 
            `college`, `collegeAddress`, `collegeState`, `branchYear`) VALUES ( '$name', '$gender', '$email', 
            '$contact', '$password', '$event', '$college', '$collegeAddress ', '$state', '$branch')";
            if ($conn->query($sql) == true){
                $success = true;
            }
    
        }else{
            $sql = "INSERT INTO `participants` ( `name`, `Gender`, `email`, `contact`, `password`, `referral`, `event`, 
            `college`, `collegeAddress`, `collegeState`, `branchYear`) VALUES ( '$name', '$gender', '$email', 
            '$contact', '$password', '$referral', '$event', '$college', '$collegeAddress ', '$state', '$branch')";
            if ($conn->query($sql) == true){
                $success = true;
            }
        }
    }else{
        $error = true;
        $errormsg = " Your password does not match with confirm password";
    }

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
        <h2><u>REGISTER</u></h2>
        <?php
        if ($success == true){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Login to check your hostel accomodation or deregister yourself.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if ($error == true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>'.$errormsg.
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>  
        <form class="register" action="participate.php" method="post">
            <div class="register1">
                <div>
                    <label class = "title" for="name">NAME*</label><br>
                    <input required placeholder="Full Name" type="text" id = "name" name="name">
                </div>
                <div class="gender">
                    <label class = "title" for="gender">GENDER</label><br>
                    <label for="gender">Female</label>
                    <input type="radio" id = "gender" name="gender" value="f">
                    <label for="gender">Male</label>
                    <input type="radio" id = "gender" name="gender" value="m">
                    <label for="gender">Not prefer to say</label>
                    <input type="radio" id = "gender" name="gender" value="n">
                </div>
                <div>
                    <label class = "title" for="email">EMAIL ID</label><br>
                    <input required placeholder="Your Email" type="email" id ="email" name="email">
                </div>
                <div>
                    <label class = "title" for="contact">CONTACT</label><br>
                    <input required placeholder="Your Contact" type="tel" id="contact" name="contact">
                </div>
                <div>
                    <label class = "title" for="password">ENTER PASSWORD</label><br>
                    <input required placeholder="Your Password" type="password" id ="password" name="password">
                </div>
                <div>
                    <label class = "title" for="confirmPassword">CONFIRM PASSWORD</label><br>
                    <input required placeholder="Confirm Password" type="password" id ="confirmPassword" name="confirmPassword">
                </div>
                <div>
                    <label class = "title" for="Referral" >REFERRAL CODE</label><br>
                    <input type="text" placeholder="(optional)" id = "Referral" name="referral">
                </div>
                <div>
                    <label class = "title" for="primaryEvent">PRIMARY EVENT</label><br>
                    <select name="event" id="event" required aria-placeholder="-select the event interested in-">
                        <option selected hidden value=""><--Select Event--></option>
                        <option value="event 1">event 1</option>
                        <option value="event 2">event 2</option>
                    </select>
                </div>
    
            </div>
            
            <div class="gridSpread">
                <div class="itemSpread"  id="collegeBox">
                    <label class = "title" for="college">COLLEGE</label><br>
                    <select required name="college" id="college">
                        <option selected hidden value="">Select Your College</option>
                        <option value="Chandigarh University">Chandigarh University Mohali Punjab</option>
                        <option value="Chandigarh University, Mohali">Chandigarh University Mohali Punjab skdhkajsd skjfkldfjaf </option>
                        <option value="College">college 2</option>
                    </select>
                </div>

                <div id="collegeAddressBox">
                    <label class = "title" for="collegeAddress">PRESENT COLLEGE ADDRESS</label><br>
                    <textarea required placeholder="Your current college address" name="collegeAddress" id="collegeAddress" cols="70" rows="4"></textarea>
                </div>

                <div class="itemSpread" id="collegeStateBox">
                    <label class = "title" for="collegeState">COLLEGE STATE</label><br>
                    <input required placeholder="College State" type="text" id = "collegeState" name="collegeState">
                </div>

                <div class = "itemSpread" id="branchBox">
                    <label class = "title" for="branch">BRANCH & YEAR</label><br>
                    <input required placeholder="Your branch along with year" type="text" id="branch" name="branch">
                </div>

            </div>

            <input type="submit" value= "Register">

            <a class="btn" href="Login.html">LOGIN</a>
        </form>  
    </div>
</body>
</html>