<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['ID'])){
  
  header("location:../login");
}
//error_reporting(0);
require_once('../db.php');


 $user_id=$_SESSION['ID'];
  
  $username=$_SESSION['user_login'];
  
$q="SELECT SUM(points) as points FROM activity_logs WHERE user_id=$user_id";
$q=mysqli_query($conn,$q);

while($row=mysqli_fetch_assoc($q)){
 $points= $row['points'];

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>Dashboard</title>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9126448246377009"
     crossorigin="anonymous"></script>

  <style type="text/css">
a {
 color: white;
  }
  a:hover{
    color:green;
  }
  </style>
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
                <div class="messages">
                  <i class="bi bi-grid-3x3-gap-fill"></i>
                </div>
              </a>
              <div class="">
                 <div class="row row-cols-3 gx-2">
                 
               
               
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
            <li class="nav-item dropdown dropdown-large" style="color: white;">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="notifications">
               
               <span class="count"></span>   <i class="bi bi-bell-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end" >
                <div class="p-2 border-bottom m-2">
                   <ul class="nav navbar-nav navbar-right">
   
     </ul>
                   
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
       <main class="page-content">
            <marquee>   <h2>Welcome <?php echo $username; ?></h2></marquee><br>
           <center> <input type="button" value="Membership Plan: <?php echo $_SESSION['plan'];?>"  class="btn btn-primary " style="background-color: #ff0080; color:white; width:80%;"> </center><br>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div>
                          <p class="mb-0 text-secondary">Minning Earnings + Chat Earnings</p>
                          <h4 class="my-1"><?php echo $points;?></h4>
                          <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> going up</p>
                      </div>
                      <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-basket2-fill"></i>
                      </div>
                  </div>
              </div>
            </div>
           </div>


<?php  


       //number of refs
            $q="SELECT * FROM `wp_users` WHERE user_login='$username' LIMIT 1";
            $q=mysqli_query($conn,$q);
            while($row=mysqli_fetch_assoc($q)){
     $no_of_referral =   $row['no_of_referral'];
          
      } 
                //affiliate id
            $q="SELECT * FROM wp_uap_affiliates WHERE uid='$user_id'";
            $q=mysqli_query($conn,$q);
            while($row=mysqli_fetch_assoc($q)){
      $affiliate_id=   $row['id'];
          
      }
      
      $affiliate_id;
      //all paid
            $q="SELECT SUM(amount) as amount FROM `wp_uap_referrals` WHERE payment='2' AND affiliate_id='$user_id'";
      $q=mysqli_query($conn,$q);
      
    $all_paid=mysqli_num_rows($q);
    while($row=mysqli_fetch_assoc($q)){
 $all_paid_amount =  $row['amount'];
      
    }
    
    
    //all unpaid
            $q="SELECT SUM(amount) as amount FROM wp_uap_referrals WHERE affiliate_id='$user_id' AND payment='0'";
      $q=mysqli_query($conn,$q);
      
      $all_unpaid=mysqli_num_rows($q);
    
    while($row=mysqli_fetch_assoc($q)){
      $all_un_paid_amount = $row['amount'];
      
    }
    
    
    //all referral
        $q="SELECT * FROM wp_uap_referrals WHERE affiliate_id='$affiliate_id' AND source='User register'";
    
      $q=mysqli_query($conn,$q);
        $total_referral=mysqli_num_rows($q);
      while($row=mysqli_fetch_assoc($q)){
          $affiliate_id=$row['affiliate_id'];
        //print_r($row);
        
      }




  
      
    
      ?>



           <div class="col">
              <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Paid Referral Earnings</p>
                            <h4 class="my-1"><?php echo $all_paid_amount; ?></h4>
                            <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> count <?php echo $all_paid; ?> referral</p>
                        </div>
                        <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-currency-exchange"></i>
                        </div>
                    </div>
                </div>
            </div>
           </div>
           <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div>
                          <p class="mb-0 text-secondary">Total Referrals</p>
                          <h4 class="my-1"><?php echo $no_of_referral; ?></h4>
                          <p class="mb-0 font-13 text-danger"><i class="bi bi-caret-down-fill"></i> going up</p>
                      </div>
                      <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-people-fill"></i>
                      </div>
                  </div>
              </div>
           </div>
           </div>
           <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                  <div class="d-flex align-items-center">
                      <div>
                          <p class="mb-0 text-secondary">Unpaid Referral Earnings</p>
                          <h4 class="my-1"><?php echo   $all_un_paid_amount; ?></h4>
                          <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> count <?php echo $all_unpaid; ?> referral</p>
                      </div>
                      <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-bar-chart-line-fill"></i>
                      </div>
                  </div>

              </div>
            </div>
           </div>

                     <div class="col-12">
            <div class="card radius-10">
        

               <h5 class="fs-13 mb-0 text-black">Referral Link</h5>


<input type="text" value="https://bitzvaultz.com.ng/register.php?id=<?php echo $user_id; ?>" id="myInput" class="form-control" style="width: 60%;" ><input type="button" value="Click to copy link" onclick="myFunction()" onmouseout="outFunc()" class="btn btn-primary " style="background-color: #ff0080; color:white; width:60%;">
            </div>
           </div>


        </div><!--end row-->



<h4>User's Functionalities</h4>

   

       <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 row-cols-xxl-6">

             <?php

$membership = $_SESSION['plan'];

if($membership ==='premium'){?>

        
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3  text-primary">
                    <a href="mine.php">  <i class="lni lni-android" style="font-size: 70px; padding-top: 10px; color:#ff0080;"></i></a>
                    </div>
                     <p class="mb-0" href="mine.php">Engine Room</p>
                  <a href="mine.php"> <h3 class="mt-4 mb-0" style="color:white;">Minning <br> Robot</h3></a>
              
                  </div>
                </div>
              </div>

              <?php
}else{
                    ?>



                        <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3  text-primary">
                    <a href="basic-mine.php">  <i class="lni lni-android" style="font-size: 70px; padding-top: 10px; color:#ff0080;"></i></a>
                    </div>
                     <p class="mb-0" href="basic-mine.php">Engine Room</p>
                  <a href="basic-mine.php"> <h3 class="mt-4 mb-0" style="color:white;">Minning <br> Robot</h3></a>
              
                  </div>
                </div>
              </div>
            
             

                <?php 
}
        ?>

         <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-danger text-danger">
                    <a href="chat.php">  <i class="bi bi-chat" style="font-size: 70px; color:white; padding-top: 10px;"></i></a>
                    </div>
                   <a href="chat.php" style="color:white;"> <p class="mb-0">Sponsored</p></a>
                     <a href="chat.php"><h3 class="mt-4 mb-0" style="color:white;">Sponsored Post</h3></a>
                     <small class="text-success">version 2.0</small>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-success text-success">
                      <i class="lni lni-angular" style="font-size: 70px; padding-top: 10px;"></i>
                    </div>
                    <p class="mb-0"></p>
                    <a href="withdraw.php"> <h3 class="mt-4 mb-0" style="color: white;">Activity <br>Withdrawal</h3></a>
                     <small class="text-danger">paid in Crypto</small>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-info text-info">
                      <i class="lni lni-airbnb" style="font-size: 70px; padding-top: 10px;"></i>
                    </div>
                    <p class="mb-0"></p>
                    <a href="withdraw_ref.php"> <h3 class="mt-4 mb-0" style="color: white;">Referral <br> Withdrawal</h3></a>
                      <small class="text-danger">paid in Crypto</small>
                  </div>
                </div>
              </div>

              <?php

if($membership ==='regular'){?>
      
               <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-info text-info">
                      <i class="lni lni-airbnb" style="font-size: 70px; padding-top: 10px;"></i>
                    </div>
                    <p class="mb-0"></p>
                    <a href="upgrade.php"> <h3 class="mt-4 mb-0" style="color: white;">Upgrade <br> Membership</h3></a>
                      <small class="text-danger">with code activation code</small>
                  </div>
                </div>
              </div>
<?php
}
                    ?>

              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center">
                    <div class="widget-icon mx-auto mb-3 bg-light-orange text-orange">
                      <i class="bi bi-pie-chart-fill" style="font-size: 70px; padding-top: 10px;"></i>
                    </div>
                    <p class="mb-0"></p>
                    <h3 class="mt-4 mb-0">Re-activate<br> Account</h3>
                    <small class="text-success">Account expires after 3 months</small>
                  </div>
                </div>
              </div>
            </div>

     


    
        



 
        </div>

        
      </main>

      <script type="text/javascript">
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
</script>
   <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
         <!--start switcher-->
      
       <!--end switcher-->

  </div>
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


<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert1.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
