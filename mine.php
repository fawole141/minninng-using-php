<?php
session_start();
//error_reporting(0);

if(!isset($_SESSION['ID'])){
  
  header("location:../login");
}
//error_reporting(0);
require_once('../db.php');


 $user_id=$_SESSION['ID'];
  
   $username=$_SESSION['user_login'];
  
$q="SELECT SUM(points) as points FROM activity_logs WHERE user_id='$user_id' AND point_type='minning'";
$q=mysqli_query($conn,$q);

while($row=mysqli_fetch_assoc($q)){
  $points= $row['points'];

  }

$q="SELECT * FROM `wp_users` WHERE ID='$user_id'";
$q=mysqli_query($conn,$q);

while($row=mysqli_fetch_assoc($q)){
 $exp_date= $row['exp_date'];

  }




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

  <title>Dashboard</title>
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
            <a class="nav-link" href="index.html">Dashboard</a>
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
                 <a href="../" style="color: white;"><p>Home</p></a>
             
                <a href="index.php" style="color: white;"><p>Dashboard</p></a>
                   <a href="logout.php" style="color: white;"><p>Logout</p></a>
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
    <?php 
    require_once("aside.php");

    ?>

       <!--start sidebar -->
       <!--start content-->
       <br><br><br><br><br><br>
            <marquee>   <h4>Welcome <?php echo $username; ?></h4></marquee>
    <div style="color: white;">   

</div>
               <script type="text/javascript">
  
    var upgradeTime = 360;
var seconds = upgradeTime;
function timer() {
  var days        = Math.floor(seconds/24/60/60);
  var hoursLeft   = Math.floor((seconds) - (days*86400));
  var hours       = Math.floor(hoursLeft/3600);
  var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
  var minutes     = Math.floor(minutesLeft/60);
  var remainingSeconds = seconds % 60;
  function pad(n) {
    return (n < 10 ? "0" + n : n);
  }
  document.getElementById('countdown').innerHTML = pad(days) + ":" + pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
  if (seconds == 0) {
    clearInterval(countdownTimer);
    document.getElementById('countdown').innerHTML = "Loading..";
    window.location.reload();

     location.replace("insert.php")




    
    
  } else {
    seconds--;
    document.getElementById("button").disabled = true;
document.getElementById('countdown1').innerHTML = "Minning...";
  }
}




function startTime(){


countdownTimer = setInterval('timer()', 1000);

}



  </script>



<center>
    <div class="col-md-6">  


<h4>Minning Engine</h4>
 
            <div class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded">
              <div class="font-22"> <i class="lni lni-bubble"></i>
              </div>
              <div class="ms-2">  <span>Do not leave this page untill you are done minning</span>
              </div>
            </div>
       
          <br>
       <br>
        
        
            
 
              
     

   
  
         
                  <?php 
                if(isset($_GET['msg'])){ ?>
                 <div class="alert alert-success" style="height: 60px; border-radius: 20px 2px 20px 2px;">
                
          <?php  echo @$_GET['msg']; ?> <br>
           </div>

           <?php
}
           ?>



           <button class="btn btn-success"   style="width:90%; height: 40px; background-color: #ff0080; font-size: 20px;  border-radius: 50px 50px 50px 50px;"> Total Mined: <?php echo $points ?> </button> <br><br>
<button class="button"  id="button" onclick="startTime()" style="width:300px; height: 270px; border-radius: 50px 50px 50px 50px;">  <i class="lni lni-android" style="font-size: 80px; padding-top: 0px; color:;"></i><br>Click to Mine</i></button><br><br>
  

<span id="countdown1"  class="timer1" style="font-size: 20px; "></span><br>
<span id="countdown" class="timer" style="font-size: 30px; "></span>


   
</div>

</center>

<center>

<div class="col-md-4">
        <div class="card radius-10">
          <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
              <div class="col">
                <h5 class="mb-0">Recent Mines</h5>
              </div>
              <div class="col">
                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                  <div class="dropdown">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>
                
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">

  
              <table class="table align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    
                    <th>Amount</th>
                    <th>Point Type</th>
                    <th>Date</th>
                    
                  </tr>
                </thead>
                     <?php
$q="SELECT * FROM activity_logs WHERE user_id='$user_id' AND point_type='minning' ORDER BY id DESC LIMIT 20";
$q=mysqli_query($conn,$q);

while($row=mysqli_fetch_assoc($q)){


 ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['points']; ?></td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                         <span class="lni lni-android" style="font-size: 30px;"></span>
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1"><?php echo $row['point_type']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td><?php echo $row['log_date']; ?></td>
                 
                  </tr>
    
         
              
                                       <?php
  }

?>
             
                </tbody>
              </table>

            </div>
          </div>
        </div>



</div>

</center>
 
      

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