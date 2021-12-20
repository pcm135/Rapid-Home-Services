<?php 
include('dbConnection.php');
if(isset($_REQUEST['rSignup'])){
  // Checking for Empty Fields
  if(($_REQUEST['rName'] == "") || ($_REQUEST["rEmail"] == "") || ($_REQUEST['rPassword'] == "")){
    $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
  } else {
    // Email Already Registered
    $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email ='".$_REQUEST['rEmail']."'";
    $result = $conn->query($sql);
    if($result->num_rows==1){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert">Email ID Already Registered</div>';
    } else {
        // Assigning User's Values to Variables
        $rName = $_REQUEST['rName'];
        $rEmail = $_REQUEST['rEmail'];
        $rPassword = $_REQUEST['rPassword'];
        $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES('$rName', '$rEmail', '$rPassword')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert">Account Succefully Created</div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Create Account</div>';
        }
      }
  } 
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Rapid Home Services</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <a class="navbar-brand d-none d-lg-flex" href="/RHS/">
              <span>
                Rapid Home Services
              </span>
            </a>
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call : +01 123455678990
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand d-lg-none" href="/RHS/">
              <span>
                Rapid Home Services
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link pl-lg-0" href="/RHS/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/RHS/service.html">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/RHS/about.html"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/RHS/why.html">Why Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/RHS/UserRegistration.php">Registration</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/RHS/Requester/RequesterLogin.php">User Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/RHS/Admin/login.php">Admin Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/RHS/contact.html">Contact Us</a>
                </li>
              </ul>
              <from class="search_form">
                <input type="text" class="form-control" placeholder="Search here...">
                <button class="" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </from>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->


<div class="container pt-5" id="registration">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4">
   <div class="col-md-6 offset-md-3">
    <form action="" class="shadow-lg p-4" method="POST">
     <div class="form-group">
      <i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label><input type="text" class="form-control" placeholder="Name" name="rName">
     </div>
     <div class="form-group">
      <i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail">
      <small class="form-text">We'll never share your email with anyone else.</small>
     </div>
     <div class="form-group">
      <i class="fas fa-key"></i> <label for="pass" class="font-weight-bold pl-2">New Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
     </div>
     <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
     <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy</em>
     <?php if(isset($regmsg)) {echo $regmsg;} ?>
    </form>
   </div>
  </div>
 </div>

 <br>
 <br>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto footer-col">
          <div class="footer_link_box">
            <h4>
              Links
            </h4>
            <div class="footer_links">
              <a class="active" href="index.html">
                Home
              </a>
              <a class="" href="service.html">
                Services
              </a>
              <a class="" href="about.html">
                About
              </a>
              <a class="" href="why.html">
                Why Us
              </a>
              <a class="" href="contact.html">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Info
            </h4>
            <div class="contact_link_box">
              <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </p>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
              <p>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span>
                  Mon-Sat: 09.00 am - 06.00 pm
                </span>
              </p>
              <p>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span>
                  Sunday: closed
                </span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 footer-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-info">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="#">Team Rapid Home Services</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
   <!-- JavaScript Files -->
 <script src="js/jquery.min.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/all.min.js"></script>

</body>

</html>