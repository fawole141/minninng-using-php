<?php

session_start();
require_once("../db.php");
$username = $_SESSION['user_login'];
 $user_id= $_SESSION['ID'];


if($conn){
//echo 'connected';
}else{
	echo 'not connected';
}

$q="SELECT * FROM activity_logs WHERE user_id='$user_id'";
$q=mysqli_query($conn,$q);
 $result=mysqli_num_rows($q);




$date=date("Y-m-d");
$q="SELECT * FROM activity_logs WHERE user_id='$user_id' AND log_date ='$date'";
$q=mysqli_query($conn,$q);
  $result1=mysqli_num_rows($q);

if($result1>4){
header("location: basic-mine.php?msg=minning is completed for today");
exit();
}else{

	$date=date("Y-m-d");

		//miner point
		$q="INSERT INTO `activity_logs` (`id`, `user_id`, `points`, `post_id`, `point_type`, `log_date`) VALUES (NULL, '$user_id', '0.023', '1', 'minning', '$date')";



	mysqli_query($conn,$q);



header("location: basic-mine.php?msg=minning successful few more to go");
exit();
}



 if($result>4){
header("location: basic-mine.php?msg=minning is completed for today");

 }else{


	$date=date("Y-m-d");

		//miner point
			//miner point
		$q="INSERT INTO `activity_logs` (`id`, `user_id`, `points`, `post_id`, `point_type`, `log_date`) VALUES (NULL, '$user_id', '0.023', '1', 'minning', '$date')";

	mysqli_query($conn,$q);




header("location: basic-mine.php?msg=minning successful few more to go");

}

?>