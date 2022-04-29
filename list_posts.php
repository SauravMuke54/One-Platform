<?php
if(isset($_GET['business_category_name']) && !empty($_GET['business_category_name'])){
	include"./includes/dbconnect.php";
	$bcn=$_GET['business_category_name'];
	$sql="SELECT * FROM businesses WHERE business_category='{$bcn}'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		
	}else{
		exit(header("Location: ./index.php?msg=No Businesses Found For Selected Category!"));
	}
	
}else{
	exit(header("Location: ./index.php?msg=Something Went Wrong, Please Try Again!"));
}
?><!DOCTYPE html>
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

			<div class="blog-inner-grids py-md-4">
				<div class="mag-content-left-hny">
				



<?php
include"./includes/dbconnect.php";

$sql="SELECT * FROM post";

$res=mysqli_query($con,$sql);
$nor=mysqli_num_rows($res);
if($nor>0){
	?>						
		<div class="mag-hny-content mb-lg-5">
						<h3 class="hny-title">All  <span>Posts</span></h3>
						<!--/mag-left-grid-1-->
						<div class="maghny-grids-inf row">				
	<?php
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
		extract($row);
		
$sql2="SELECT full_name FROM user WHERE user_id='{$user_id}'";
$res2=mysqli_query($con,$sql2);
$nor2=mysqli_num_rows($res2);
if($nor2>0){
	while($row2=mysqli_fetch_array($res2,MYSQLI_ASSOC)){
		extract($row2);
	}
}

$sql2="SELECT user_business_name FROM businesses WHERE business_id='{$business_id}' AND business_category='{$bcn}'";
$res2=mysqli_query($con,$sql2);
$nor2=mysqli_num_rows($res2);
if($nor2>0){
	while($row2=mysqli_fetch_array($res2,MYSQLI_ASSOC)){
		extract($row2);


		?>
<div class="maghny-gd-1 col-lg-4 col-md-6">
								<div class="maghny-grid">
									<figure class="effect-lily">
										<img class="img-fluid" src="<?php echo"$post_image"; ?>" alt="">

									</figure>
								</div>
								<h5><a href="./post_details.php?post_id=<?php echo"$post_id"; ?>"><?php echo"$post_title"; ?></a></h5>
								<p><?php $max_length = 250;
if (strlen($description) > $max_length)
{
    $offset = ($max_length - 3) - strlen($description);
    $description1 = substr($description, 0, strrpos($description, ' ', $offset)) . '...';
}
 echo"$description1"; ?></p>
								<div class="mag-post-meta"><a href="#"><img src="assets/images/admin.jpg"
											class="img-fluid rounded-circle admin-img admin-img1" alt=""></a> <span
										class="meta-author"><span>By&nbsp;</span><a href="#" class="author-name"><?php echo"$user_business_name"; ?> - <?php echo"$full_name"; ?></a> </span>
									<span class="author-date"><?php echo substr($post_date_and_time,0,10); ?></span>
								</div>
							</div>
<?php
		
			}
}

	}
	
	?>
</div>
					</div>
<?php
}else{
	
}
?>	
			
			
			
		
		<?php 
		include"./includes/categories.php"; 
		?>	
		
		
				</div>
			</div>
	
		</div>
	</div>
	<!--//mag-content-->
</section>


<?php include"./includes/footer.php"; ?>	



</body>

</html>