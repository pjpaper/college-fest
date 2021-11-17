<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.html");
    exit;
}

$email = $_SESSION['email'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "";
}

$sql = "SELECT * FROM participants WHERE email LIKE '$email'";


$result = mysqli_query($conn, $sql);
$candidate = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>welcome!</title>

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="welcome.php#details"><?php echo $candidate['name'] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php#accomodation">STAY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">LOGOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="pt-4 pt-md-11">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 col-lg-6 order-md-2">
                <img src="res/welcome.png" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" alt="img">
            </div>
            <div class="col-12 col-md-7 col-lg-6 order-md-1 aos-init aos-animate" data-aos="fade-up">
                <h1 style="font-family:'Dancing Script', cursive;" class="display-3 text-center text-md-start">
                    We await your welcome at
                    <span style="font-family: sans-serif; color: #F36A6A;">PERCEPTION '21</span>
                </h1>
                <p class="lead text-center text-md-start text-muted mb-6 mb-lg-8">
                    Build friendships, shine with talent, jolly yourself
                </p>
            </div>
        </div>
        
    </div>
</section>

<section id="accomodation" class="mt-5 py-8 py-md-11 border-bottom">
    <div class="alert alert-danger" role="alert">
        <h4 class="text-center alert-heading">Well done! Registered</h4>
        <p class="text-center">Aww yeah, you successfully registered for Perception '21. We are awaiting your stay at Chandigarh University for this visionary gala.
            Accomodations have been made for your stay ! We have kept all the safety measures in mind.
        </p>
        <hr>
        <p class="text-center mb-0">You will be staying in room <u><?php echo $candidate['id']?></u> </p>
    </div>
</section>

<section id="details" class="ml-0 mt-6 py-8 py-md-11 border-bottom">
    <div class="container">
        <div class="row justify-content-center text-center align-items-center">
            <div class="col-xl-8 col-lg-9 col-md-10 layer-3 aos-init aos-animate" data-aos="fade-up" date-aos-delay="500">
                <h1 style="font-colo:black" class="display-3">
                DETAILS
                </h1>
            </div>

        </div>
    </div>
    <table class="table table-dark table-hover">
        <tr>
            <td class="text-center">
                NAME OF THE STUDENT
            </td>
            <td class="text-center">
            <?php echo $candidate['name']?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                EMAIL
            </td>
            <td class="text-center">
            <?php echo $candidate['email']?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                CONTACT
            </td>
            <td class="text-center">
            <?php echo $candidate['contact']?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                REFERRAL
            </td>
            <td class="text-center">
            <?php if ($candidate['referral'] != ""){
                        echo $candidate['referral'];
                    }else{
                        echo 'nil';
                    }?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                GENDER
            </td>
            <td class="text-center">
            <?php if ($candidate['Gender'] == 'f'){
                        echo 'female';
                    }else if($candidate['Gender'] == 'm'){
                        echo 'male';
                    }else{
                        echo 'not defined';
                    }?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                PRIMARY EVENT
            </td>
            <td class="text-center">
            <?php echo $candidate['event']?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                COLLEGE NAME
            </td>
            <td class="text-center">
            <?php echo $candidate['college']?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                COLLEGE ADDRESS
            </td>
            <td class="text-center">
            <?php echo $candidate['collegeAddress']?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                COLLEGE STATE
            </td>
            <td class="text-center">
            <?php echo $candidate['collegeState']?>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                BRANCH & YEAR
            </td>
            <td class="text-center">
            <?php echo $candidate['branchYear']?>
            </td>
        </tr>
    </table>
</section>

<section id="events" class=" mt-6 py-8 py-md-11 border-bottom">

</section>


</body>
</html>