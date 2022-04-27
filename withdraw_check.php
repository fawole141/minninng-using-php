<?php 
session_start();
error_reporting(0);
require_once('../db.php');
 $username= $_POST['username'];

 $username= $_POST['username'];
 //$media= $_POST['media'];
 
 $phone= $_POST['phone'];


 $activity =$_POST['activity'];
//$refer=$_POST['referral'];
//$account_name=$_POST['account_name'];
$wallet_address=$_POST['wallet_address'];
$bank=$_POST['bank'];

if($activity <2.0039){
	header("location:withdraw.php?msg=minimum withdrawal is 2.0039");
	exit();
}


$q="SELECT * FROM withdraw_all WHERE account_name='$username'";
$q=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($q)){
 $db_username=$row['account_name'];	
	
}

if($db_username>0){
	header("location:withdraw.php?msg=you have applied before");
	exit();
}else{

//drop withdrawal
$q="INSERT INTO `withdraw_all` (`bank_name`, `account_number`, `amount`, `account_name`, `referral_earnings`, `activity_earnings`, `id`,`media`) VALUES ('', '$wallet_address', '', '$username', '', '$activity', NULL,'$phone')";
mysqli_query($conn,$q);
header("location:withdraw.php?msg=success");
	exit();
}





?>