	

<?php
include"./includes/dbconnect.php";

$sql="SELECT * FROM post ORDER BY post_id DESC LIMIT 2";

$res=mysqli_query($con,$sql);
$nor=mysqli_num_rows($res);
if($nor>0){
	?>
	<div class="banner-bottom-sechny py-md-4">
				<h3 class="hny-title text-center">Recent <span>Posts</span></h3>
				<div class="ban-content-inf row py-lg-3">
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

$sql2="SELECT user_business_name FROM businesses WHERE business_id='{$business_id}'";
$res2=mysqli_query($con,$sql2);
$nor2=mysqli_num_rows($res2);
if($nor2>0){
	while($row2=mysqli_fetch_array($res2,MYSQLI_ASSOC)){
		extract($row2);
	}
}

		?>
		<div class="maghny-gd-1 col-md-6">
						<div class="maghny-grid">
							<figure class="effect-lily">
								<img class="img-fluid" src="<?php echo"$post_image"; ?>">
								<figcaption>


								</figcaption>
							</figure>
						</div>
<h5 class="top-title mb-3"><a href="./post_details.php?post_id=<?php echo"$post_id"; ?>"><?php echo"$post_title"; ?></a></h5>
						<p><?php $max_length = 250;
if (strlen($description) > $max_length)
{
    $offset = ($max_length - 3) - strlen($description);
    $description1 = substr($description, 0, strrpos($description, ' ', $offset)) . '...';
}
 echo"$description1"; ?></p>
						<div class="mag-post-meta mt-3"><span class="meta-author text-uppercase"><span>By&nbsp;</span><a
									href="#" class="author-name"> <?php echo"$user_business_name"; ?> - <?php echo"$full_name"; ?> </a> </span>
							<span class="author-date"><?php echo substr($post_date_and_time,0,10); ?></span>
						</div>
						<a href="./post_details.php?post_id=<?php echo"$post_id"; ?>" class="read-more btn mt-3">Read More</a>
					</div>
		<?php
		
	}
	
	?>
	</div>
			</div>
	<?php
}else{
	
}
?>


					
					
					

					
					
					
				