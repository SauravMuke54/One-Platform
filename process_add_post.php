<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])){
	extract($_POST);
	include"./includes/dbconnect.php";
$new_image_name=null;
$save_to=null;
	
	if(isset($_FILES['post_image']['size']) && $_FILES['post_image']['size']>0){
		
	
$fn=$_FILES["post_image"]["name"];

$file_data=explode(".",$fn);

$file_ext=end($file_data);

$new_image_name=rand(00000000,99999999).uniqid();

$save_to="./images/$new_image_name.jpg";

if($file_ext=="png" || $file_ext=="jpg" || $file_ext=="jpeg" || $file_ext=="gif" || $file_ext=="PNG" || $file_ext=="JPG" || $file_ext=="JPEG" || $file_ext=="GIF"){

move_uploaded_file($_FILES["post_image"]["tmp_name"],$save_to);

}else{

exit(header("Location: ./add_post.php?msg=Please Upload Image File Only!&type=error"));

}
		
	}else{
		exit(header("Location: ./add_post.php?msg=File Upload Failed Please Try Again!&type=error"));
	}
	
	$sql="INSERT INTO post(user_id,business_id,post_title,description,post_image)VALUES('$user_id','$business_id','$post_title','$description','$save_to')";
	
	if(mysqli_query($con,$sql)){
	
		exit(header("Location: ./add_post.php?msg=Post Added Successfully!&type=success"));
			
		}else{
			$err=mysqli_error($con);
			exit(header("Location: ./add_post.php?msg=$err!&type=error"));
		}
}
?> 