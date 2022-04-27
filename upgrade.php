<?php
session_start();
//error_reporting(0);

if(!isset($_SESSION['ID'])){
  
  header("location:../login");
}
//error_reporting(0);
?>


<!doctype html>
<html lang="en" class="dark-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>Upgrade Page</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <header class="top-header">        
      <nav class="navbar navbar-expand">
        <div class="mobile-toggle-icon d-xl-none">
            <i class="bi bi-list"></i>
          </div>
          <div class="top-navbar d-none d-xl-block">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Upgrade Page</a>
            </li>
          
            <li class="nav-item d-none d-xxl-block">
              <a class="nav-link" href="javascript:;">Events</a>
              </li>
              <li class="nav-item d-none d-xxl-block">
              <a class="nav-link" href="app-to-do.html">Todo</a>
              </li>
          </ul>
          </div>
          <div class="search-toggle-icon d-xl-none ms-auto">
            <i class="bi bi-search"></i>
          </div>
          <form class="searchbar d-none d-xl-flex ms-auto">
              <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
              <input class="form-control" type="text" placeholder="Type here to search">
              <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
          </form>
          <div class="top-navbar-right ms-3">
            <ul class="navbar-nav align-items-center">
           
          <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="projects">
                  <i class="bi bi-grid-3x3-gap-fill"> More</i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                 <div class="row row-cols-3 gx-2">
                 <a href="index.php" style="color: white;"><p>Dashboard</p></a>
                <a href="" style="color: white;"><p>Login</p></a>
                <a href="../register.php" style="color: white;"><p>Register</p></a>
                 </div><!--end row-->
              </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="messages">
                  
                  <i class="bi bi-messenger"></i>
                </div>
              </a>
      
            </li>
            <li class="nav-item dropdown dropdown-large d-none d-sm-block">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="notifications">
               
                  <i class="bi bi-bell-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end p-0">
                <div class="p-2 border-bottom m-2">
                    <h5 class="h5 mb-0">No Notifications</h5>
                </div>
               
              </div>
            </li>
            </ul>
            </div>
      </nav>
    </header>
       <!--end top header-->

       <!--start sidebar -->
   

       <!--start sidebar -->
       <!--start content-->
       <br><br><br><br><br><br>
           
   <div class="alert alert-success">       
               <?php 
            
echo @$_GET['msg'];

             ?>

         </div>
            
      <form method="post" action="upgrade_check.php">
        <label>Enter Coupon Code</label><br>
        <input type="text" name="code" class="form-control" placeholder="enter coupon code"><br>
        <select name="type" class="form-control">
          <option value="premium" selected="">Premium</option>
        </select><br><br>
        <input type="submit" value="submit" class="btn btn-success btn-block">
      </form>
     









 
      

     <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
         <!--start switcher-->
      
       <!--end switcher-->

 
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/js/pace.min.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <!--app-->
  <script src="assets/js/app.js"></script>
  <script src="assets/js/index.js"></script>

  <script>
     new PerfectScrollbar(".best-product")
     new PerfectScrollbar(".top-sellers-list")
  </script>
  

</body>

</html>