<?php 
 include('../dbConnection.php');
 session_start();
 if(!isset($_SESSION['is_adminlogin'])){
  if(isset($_REQUEST['aEmail'])){
   $aEmail = mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
   $aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['aPassword']));
   $sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email = '".$aEmail."' AND a_password = '".$aPassword."' limit 1";
   $result = $conn->query($sql);
   if($result->num_rows == 1){
    $_SESSION['is_adminlogin'] = true;
    $_SESSION['aEmail'] = $aEmail;
    echo "<script> location.href='dashboard.php';</script>";
    exit;
   } else {
    $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>';
   }
  }
 } else {
  echo "<script> location.href='dashboard.php';</script>";
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
  <link rel="icon" href="../images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />


  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->
  <!-- font awesome style -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />

   <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="../css/all.min.css">

<style>
 .custom-margin {
  margin-top: 8vh;
 }
</style>

<title>Login</title>

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

<br>
<br>

 <p class="text-center" style="font-size:40px;"><i class="fas fa-user-secret text-danger"></i>Admin Login</p>
 <div class="container-fluid">
  <div class="row justify-content-center custom-margin">
   <div class="col-sm-6 col-md-4">
    <form action="" class="shadow-lg p-4" method="POST">
     <div class="form-group">
      <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="aEmail">
      <small class="form-text">We'll never share your email with anyone else.</small>
     </div>
     <div class="form-group">
      <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label><input type="password" class="form-control" placeholder="Password" name="aPassword">
     </div>
     <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">Login</button>
     <?php if(isset($msg)) {echo $msg;} ?>
    </form>
    <div class="text-center"><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
   </div>
  </div>
 </div>

 <br>
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
 <script src="../js/jquery.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/all.min.js"></script>

</body>

</html>
