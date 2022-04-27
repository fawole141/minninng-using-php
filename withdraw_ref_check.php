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

if($activity <4){
	header("location:withdraw_ref.php?msg=minimum withdrawal is 4 Ada");
	exit();
}

$q="SELECT * FROM withdraw_all_ref WHERE account_name='$username'";
$q=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($q)){
 $db_username=$row['account_name'];	
	
}

if(empty($db_username)){

			    //affiliate id
				  $user_id=	$_SESSION['ID'];
            $q="SELECT * FROM wp_uap_affiliates WHERE uid='$user_id'";
            $q=mysqli_query($conn,$q);
			//print_r($q);
            while($row=mysqli_fetch_assoc($q)){
         $affiliate_id=   $row['id'];
          
			}


					//all unpaid
						$q="SELECT SUM(amount) as amount FROM wp_uap_referrals WHERE payment='0' AND affiliate_id='$user_id'";
			$q=mysqli_query($conn,$q);
			
		 $all_paid=mysqli_num_rows($q);
		
		while($row=mysqli_fetch_assoc($q)){
			$all_un_paid_amount=$row['amount'];
			
		}

if($refer>$all_un_paid_amount){
header("location:withdraw_ref.php?msg=your money did not reach that amount you applied for");
	exit();	

}

 $total = $all_un_paid_amount - $refer;



//insert the real total point 
		      $q="INSERT INTO `wp_uap_referrals` (`id`, `refferal_wp_uid`, `campaign`, `affiliate_id`, `visit_id`, `description`, `source`, `reference`, `reference_details`, `parent_referral_id`, `child_referral_id`, `amount`, `currency`, `date`, `status`, `payment`) VALUES (NULL, '$user_id', NULL,  '$ref', NULL, 'User register', 'after refer', '$refer', 'User register', '0', '0', '$total', '#', '$date', '2', '0')";
            mysqli_query($conn,$q);
            


		

//deduct referral earnings
$q="UPDATE wp_uap_referrals SET payment='2' WHERE affiliate_id='$user_id'";
mysqli_query($conn,$q);


//drop withdrawal
$q="INSERT INTO `withdraw_all_ref` (`bank_name`, `account_number`, `amount`, `account_name`, `referral_earnings`, `activity_earnings`, `id`,`media`) VALUES ('', '$wallet_address', '', '$username', '$refer', '$activity', NULL,'$phone')";
mysqli_query($conn,$q);


header("location:withdraw_ref.php?msg=success");
	exit();	

}else{
	
header("location:withdraw_ref.php?msg=you have applied for withdrawal today and you cannot apply twice");
	exit();	
}

?>






