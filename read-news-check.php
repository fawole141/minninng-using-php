<?php
session_start();
require_once('../db.php');

 $author= $_SESSION['user_login'];


 
$post_id=$_POST['post_id'];
  
  
  $comment = $_POST['comment'];



  	//assign comment point
	$q = "SELECT * FROM `comment_point` ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn,$q);
 
 while($row=mysqli_fetch_assoc($result)){
	 $comment_point= $row['value'];
 
 }


 

 	//get user id
	$q = "SELECT * FROM `wp_users` WHERE user_login='$author' LIMIT 1";
$result = mysqli_query($conn,$q);
 
 while($row=mysqli_fetch_assoc($result)){
 $user_id= $row['ID'];

	 
 }



//if your earnings is up to 3500 it should say go and withdraw
			$q="SELECT SUM(points) as points FROM activity_logs WHERE user_id='$user_id'";
$q=mysqli_query($conn,$q);

while($row=mysqli_fetch_assoc($q)){
	$points= $row['points'];
	
}


 
 
	//if commented before
	$q = "SELECT * FROM `posts` WHERE author='$author'";
$result = mysqli_query($conn,$q);
 $total = mysqli_num_rows($result);
	
	if($total>0){
	
		
	header("location:chat.php?msg=You have commented before");
 exit();
	}else{
	
	
	//insert comment
	
	 	$date = date("Y-m-d");
$q="INSERT INTO `posts` (`id`, `title`, `content`, `permalink`, `featured_image`, `author`, `date`, `post_type`, `status`) VALUES (NULL, '$comment', '$comment', '', '', '$author', '$date', 'comment', 'draft')";
mysqli_query($conn,$q); 

}



$query="SELECT * FROM `activity_logs` WHERE user_id='$user_id'";
	$result=$conn->query($query);
	

		while($row=$result->fetch_assoc()){
			 $current_date= date('Y-m-d');
		 $last_login=$row['log_date'];
		
		 // header("location:../user");
		  //exit();
		}
		

		


		if($last_login===$current_date){
			
//echo 'you have been c b4';
		
			
	//		 header("location:../dashboard");
		// exit();
		}else{
		
	
		//daily login INSERTION 
		$date=date('Y-m-d');
		$q="INSERT INTO `activity_logs` (`id`, `user_id`, `points`, `post_id`, `point_type`, `log_date`) VALUES (NULL, '$user_id', '0.000074382', '1', 'comment earnings', '$date')";

		mysqli_query($conn,$q);

		
		
		}
		
			
		if(empty($last_login)){
			
	//daily login INSERTION for first timer
		$date=date('Y-m-d');
		$q="INSERT INTO `activity_logs` (`id`, `user_id`, `points`, `post_id`, `point_type`, `log_date`) VALUES (NULL, '$user_id', '0.000074382', '1', 'comment earnings', '$date')";

		mysqli_query($conn,$q);
		
		}




	 header("location:chat.php?msg=Success");
 exit();

?>






