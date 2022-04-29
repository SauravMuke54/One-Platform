<?php
session_start();

if(isset($_GET['register']) && !empty($_GET['register'])){
session_regenerate_id();	
extract($_GET);
$otp=rand(000000,999999);
$_SESSION['otp']=$otp;
$fullname=$namefirst." ".$namelast;
$subject="Verify Your Email Address!";
	$message = "
<html>
<body>
<p>Dear $fullname,</p>
<p>Your OTP to Verify Email Address is: $otp</p>
<p><strong>Thanks & Regards</strong><br/>Team One Platform</p>
</body>
</html>
";
		$from="nehabathe19@gmail.com";
		// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$from.'>' . "\r\n";
$headers .= 'Cc: '.$from.'' . "\r\n";
print_r($_SESSION);		
		@mail($email,$subject,$message,$headers);
	
}elseif(isset($_GET['submitotp']) && !empty($_GET['submitotp'])){
	
	extract($_GET);
	if(isset($_SESSION['otp']) && !empty($_SESSION['otp']) && $_SESSION['otp']==$otp){
		
		include"./includes/dbconnect.php";
		
		$fullname=$namefirst." ".$namelast;
		
		$sql="INSERT INTO user(full_name,gender,email,mobile_number,password)VALUES('$fullname','$gender','$email','$mobilenumber','$password')";
		
		if(mysqli_query($con,$sql)){
	
		exit(header("Location: ./login.php?msg=User Registered Successfully!&type=success"));
			
		}else{
			$err=mysqli_error($con);
			exit(header("Location: ./register.php?msg=$err!&type=error"));
		}
		
	}else{
		exit(header("Location: ./register.php?msg=Wrong OTP, Please Try Again!&type=error"));
	}
		
	
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  
 <?php include"./includes/head_data.php"; ?>


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
<?php			
if(isset($_GET['register']) && !empty($_GET['register'])){
?>
		<!-- Start Formoid form-->
<link rel="stylesheet" href="fid/formoid-solid-purple.css" type="text/css" />
<script type="text/javascript" src="fid/jquery.min.js"></script>
<form class="formoid-solid-purple" style="background-color:#FFFFFF;font-size:16px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:600px;min-width:150px" method="get" action="./register.php">
<input type="hidden" name="namefirst" value="<?php if(isset($namefirst)){ echo"$namefirst"; } ?>">
<input type="hidden" name="namelast" value="<?php if(isset($namelast)){ echo"$namelast"; } ?>">
<input type="hidden" name="gender" value="<?php if(isset($gender)){ echo"$gender"; } ?>">
<input type="hidden" name="mobilenumber" value="<?php if(isset($mobilenumber)){ echo"$mobilenumber"; } ?>">
<input type="hidden" name="email" value="<?php if(isset($email)){ echo"$email"; } ?>">
<input type="hidden" name="password" value="<?php if(isset($password)){ echo"$password"; } ?>">

<div class="title"><h2>Verify Email ID</h2></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="otp" required="required" placeholder="Enter OTP Received"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" name="submitotp" value="Verify"/></div></form>
<script type="text/javascript" src="fid/formoid-solid-purple.js"></script>
<!-- Stop Formoid form-->
<?php	
}elseif(isset($_GET['submitotp']) && !empty($_GET['submitotp'])){
?>
		<!-- Start Formoid form-->
<link rel="stylesheet" href="fid/formoid-solid-purple.css" type="text/css" />
<script type="text/javascript" src="fid/jquery.min.js"></script>
<form class="formoid-solid-purple" style="background-color:#FFFFFF;font-size:16px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:600px;min-width:150px" method="get" action="./register.php">
<input type="hidden" name="namefirst" value="<?php if(isset($namefirst)){ echo"$namefirst"; } ?>">
<input type="hidden" name="namelast" value="<?php if(isset($namelast)){ echo"$namelast"; } ?>">
<input type="hidden" name="gender" value="<?php if(isset($gender)){ echo"$gender"; } ?>">
<input type="hidden" name="mobilenumber" value="<?php if(isset($mobilenumber)){ echo"$mobilenumber"; } ?>">
<input type="hidden" name="email" value="<?php if(isset($email)){ echo"$email"; } ?>">
<input type="hidden" name="password" value="<?php if(isset($password)){ echo"$password"; } ?>">
<div class="title"><h2>Verify Email ID</h2></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="otp" required="required" placeholder="Enter OTP Received"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" name="submitotp" value="Verify"/></div></form>
<script type="text/javascript" src="fid/formoid-solid-purple.js"></script>
<!-- Stop Formoid form-->
<?php	
}else{
?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="fid/formoid-solid-purple.css" type="text/css" />
<script type="text/javascript" src="fid/jquery.min.js"></script>
<form class="formoid-solid-purple" style="background-color:#FFFFFF;font-size:16px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:600px;min-width:150px" method="get" action="./register.php">
<input type="hidden" name="msg" value="Please Enter OTP Received on Your Email ID!">
<input type="hidden" name="type" value="success">
<div class="title"><h2>User Registration</h2></div>
	<div class="element-name"><label class="title"><span class="required">*</span></label><span class="nameFirst"><input placeholder="Name First" type="text" size="8" name="namefirst" required="required"/><span class="icon-place"></span></span><span class="nameLast"><input placeholder="Name Last" type="text" size="14" name="namelast" required="required"/><span class="icon-place"></span></span></div>
	<div class="element-radio"><label class="title">Gender<span class="required">*</span></label>		<div class="column column2"><label><input type="radio" name="gender" value="Male" required="required"/><span>Male</span></label></div><span class="clearfix"></span>
		<div class="column column2"><label><input type="radio" name="gender" value="Female" required="required"/><span>Female</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-phone"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" pattern="[0-9]{10,10}" maxlength="10" name="mobilenumber" required="required" placeholder="XXXXXXXXXX" value=""/><span class="icon-place"></span></div></div>
	<div class="element-email"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="email" name="email" value="" required="required" placeholder="Email"/><span class="icon-place"></span></div></div>
	<div class="element-password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" name="register" value="Register"/></div></form>
<script type="text/javascript" src="fid/formoid-solid-purple.js"></script>
<!-- Stop Formoid form-->
<?php	
}
?>
		
	
		</div>
	</div>
	<!--//mag-content-->
</section>


<?php include"./includes/footer.php"; ?>	



</body>

</html> 