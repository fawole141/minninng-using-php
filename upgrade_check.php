<?php
session_start();
 $user_id = $_SESSION['ID'];
require_once('../db.php');

$coupon = $_POST['code'];
$type = $_POST['type'];

$query="SELECT * FROM `coupons` WHERE name='$coupon' AND used_by='none'";
$query=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($query)){
	
  $db_coupon = $row['name'];
 $db_used_by=$row['used_by'];	
}


if($db_coupon===$coupon AND $db_used_by==='none'){
 $exp_date = date('Y-m-d', strtotime('+15 day'));

 $q="UPDATE activity_logs SET points='0' WHERE user_id='$user_id'";
mysqli_query($conn,$q);

$q="UPDATE wp_users SET display_name ='$type', user_activation_key='$exp_date' WHERE ID='$user_id'";
mysqli_query($conn,$q);




	header("location:upgrade.php?msg=successfully upgraded to premium package");
 	exit();

 }else{
 	header("location:upgrade.php?msg=code not valid");
 	exit();
 }


?>