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
<?php
if(isset($_GET['pid']) && !empty($_GET['pid'])){
	$pid=$_GET['pid'];
	include"./includes/dbconnect.php";
	$sql3="DELETE FROM businesses WHERE business_id='{$pid}'";
	if(mysqli_query($con,$sql3)){
		exit(header("Location: ./my_businesses.php?msg=Business Deleted Successfully!&type=success"));
	}else{
		exit(header("Location: ./my_businesses.php?msg=Something Went Wrong Please Try Again!&type=error"));
	}
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  
 <?php include"./includes/head_data.php"; ?>
	 <script src="./cke-editor/ckeditor.js"></script> 
<style>
	p {
  text-align: justify;
}

#acalender {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#acalender td, #acalender th {
  border: 1px solid #ddd;
  padding: 8px;
}

#acalender tr:nth-child(even){background-color: #f2f2f2;}

#acalender tr:hover {background-color: #ddd;}

#acalender th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

#acalender tr:first-child td {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

	</style>
</head>

<body>


<?php include"./includes/header.php"; ?>




<?php 

//include"./includes/slider.php"; 

?>

<!-- //w3l-banner-slider-main -->
<section class="w3l-mag-main">
	<!--/mag-content-->
	<div class="mag-content-inf py-5 pl-5 pr-5">
	
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
<table width="100%" border="1px solid black" id="acalender" >
<tr>
<th>SR. NO</th>
<th>BUSINESS NAME</th>
<th>BUSINESS CATEGORY</th>
<th>BUSINESS ADDRESS</th>
<th>BUSINESS CONTACTS</th>
<th>ACTION</th>
</tr>
<?php
include"./includes/dbconnect.php";

$sql="SELECT * FROM businesses WHERE user_id='{$user_id}' ORDER BY business_id DESC";

$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	$count=1;
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
		extract($row);
		
	?>
		<tr>
<td><?php echo"$count"; ?></td>
<td><?php echo"$user_business_name"; ?></td>
<td><?php echo"$business_category"; ?></td>
<td><?php echo"$business_address"; ?></td>
<td><?php echo"$business_contacts"; ?></td>
<td><a href="my_businesses.php?pid=<?php echo"$business_id"; ?>" class="btn btn-danger">Delete</a></td>
		</tr>
		<?php
		$count=$count+1;
	}
	
}else{
	?>
		<tr>
<td colspan="6"><center>No Records Found</center></td>
		</tr>
		<?php
}

?>
	</table>
		
	</div>
	<!--//mag-content-->
</section>


<?php include"./includes/footer.php"; ?>	



</body>

</html>