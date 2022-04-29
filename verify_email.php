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
			
		<!-- Start Formoid form-->
<link rel="stylesheet" href="fid/formoid-solid-purple.css" type="text/css" />
<script type="text/javascript" src="fid/jquery.min.js"></script>
<form class="formoid-solid-purple" style="background-color:#FFFFFF;font-size:16px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:600px;min-width:150px" method="get" action="./verify_email.php"><div class="title"><h2>Verify Email ID</h2></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="otp" required="required" placeholder="Enter OTP Received"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" name="submitotp" value="Verify"/></div></form>
<script type="text/javascript" src="fid/formoid-solid-purple.js"></script>
<!-- Stop Formoid form-->
	
		</div>
	</div>
	<!--//mag-content-->
</section>


<?php include"./includes/footer.php"; ?>	



</body>

</html>  