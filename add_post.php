<?php
if(session_status()!=PHP_SESSION_ACTIVE){
session_start();
}
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	extract($_SESSION);
}else{
	exit(header("Location: ./login.php?msg=Please Login First!&type=error"));
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  
 <?php include"./includes/head_data.php"; ?>
	 <script src="./cke-editor/ckeditor.js"></script> 

</head>

<body>


<?php include"./includes/header.php"; ?>




<?php 

//include"./includes/slider.php"; 

?>

<!-- //w3l-banner-slider-main -->
<section class="w3l-mag-main">
	<!--/mag-content-->
	<div class="mag-content-inf py-5">
		<div class="container">
			<?php
		if(isset($_GET['msg']) && !empty($_GET['msg'])){
			$msg=$_GET['msg'];
			if(isset($_GET['type']) && !empty($_GET['type'])){
				if($_GET['type']=="success"){
			echo"<center><h3 style=\"background-color:green;font-size:22px;font-family:'Roboto',Arial,Helvetica,sans-serif;max-width:600px;color:white;\">$msg</h3></center>";
				}elseif($_GET['type']=="error"){
			echo"<center><h3 style=\"background-color:red;font-size:22px;font-family:'Roboto',Arial,Helvetica,sans-serif;max-width:600px;white;\">$msg</h3></center>";
				}else{
			echo"<center><h3 style=\"background-color:orange;font-size:22px;font-family:'Roboto',Arial,Helvetica,sans-serif;max-width:600px;\">$msg</h3></center>";
				}
		}else{
		echo"<center><h3 style=\"background-color:orange;font-size:22px;font-family:'Roboto',Arial,Helvetica,sans-serif;max-width:600px;\">$msg</h3></center>";	
		}
		}
		?>
			<!-- Start Formoid form-->
<link rel="stylesheet" href="addnewpost_files/formoid1/formoid-flat-blue.css" type="text/css" />
<script type="text/javascript" src="addnewpost_files/formoid1/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-flat-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:90%;min-width:150px" method="post" action="process_add_post.php" >
<input type="hidden" name="user_id" value="<?php echo"$user_id"; ?>">
<div class="title"><h2>Add New Post</h2></div>
	<div class="element-select"><label class="title">Select Business<span class="required">*</span></label><div class="large"><span><select name="business_id" required="required">
	<option value="">--PLease Select Business--</option>
<?php
include"./includes/dbconnect.php";
echo $sql="SELECT * FROM businesses WHERE user_id='{$user_id}'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
			while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
				extract($row);
?>
			<option value="<?php echo"$business_id"; ?>"><?php echo"$user_business_name"; ?></option>
			<?php
			}			
		}
?>
		
		
		</select><i></i></span></div></div>
	<div class="element-input"><label class="title">Post Title<span class="required">*</span></label><input class="large" type="text" name="post_title" required="required"/></div>
	<div class="element-textarea"><label class="title">Description<span class="required">*</span></label><textarea  name="description" cols="20" rows="5" required="required" class="ckeditor"></textarea></div>
	<div class="element-file"><label class="title">Image</label><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="post_image" required="required" /><div class="file_text">No image file selected</div></label></div>
<div class="submit"><input type="submit" name="submit" value="Add"/></div></form>
<script type="text/javascript" src="addnewpost_files/formoid1/formoid-flat-blue.js"></script>
<!-- Stop Formoid form-->
	
		</div>
	</div>
	<!--//mag-content-->
</section>


<?php include"./includes/footer.php"; ?>	



</body>

</html>