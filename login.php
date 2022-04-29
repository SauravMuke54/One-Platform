<?php
if(session_status()!=PHP_SESSION_ACTIVE){
session_start();
}
if(isset($_GET['login']) && !empty($_GET['login'])){
	
	extract($_GET);

		include"./includes/dbconnect.php";
		
		echo $sql="SELECT * FROM user WHERE email='{$email}' AND password='{$password}'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
			while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
				extract($row);
session_regenerate_id();
$_SESSION['user_id']=$user_id;	
$_SESSION['full_name']=$full_name;	
$_SESSION['email']=$email;	
$_SESSION['mobile_number']=$mobile_number;	
		exit(header("Location: ./dashboard.php"));
			}

			
		}else{
			
			exit(header("Location: ./login.php?msg=Wrong Email ID or password!&type=error"));
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
		<!-- Start Formoid form-->
<link rel="stylesheet" href="fid/formoid-solid-purple.css" type="text/css" />
<script type="text/javascript" src="fid/jquery.min.js"></script>
<form class="formoid-solid-purple" style="background-color:#FFFFFF;font-size:16px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:600px;min-width:150px" method="get" action="./login.php"><div class="title"><h2>User Login</h2></div>
	<div class="element-email"><label class="title"></label><div class="item-cont"><input class="large" type="email" name="email" value="" placeholder="Email"/><span class="icon-place"></span></div></div>
	<div class="element-password"><label class="title"></label><div class="item-cont"><input class="large" type="password" name="password" value="" placeholder="Password"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" name="login" value="Login"/></div></form>
<script type="text/javascript" src="fid/formoid-solid-purple.js"></script>
<!-- Stop Formoid form-->
	
		</div>
	</div>
	<!--//mag-content-->
</section>


<?php include"./includes/footer.php"; ?>	



</body>

</html>  