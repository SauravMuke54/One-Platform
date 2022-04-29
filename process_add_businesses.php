<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])){
	extract($_POST);
	include"./includes/dbconnect.php";
	
	$sql="INSERT INTO businesses(user_id,user_business_name,business_category,business_address,business_contacts)VALUES('$user_id','$user_business_name','$business_category','$business_address','$business_contacts')";
	
	if(mysqli_query($con,$sql)){
	
		exit(header("Location: ./add_businesses.php?msg=Post Added Successfully!&type=success"));
			
		}else{
			$err=mysqli_error($con);
			exit(header("Location: ./add_businesses.php?msg=$err!&type=error"));
		}
}
?> 