	<div class="mag-hny-content my-lg-5" id="categories">
						<h3 class="hny-title">Top <span>Categories</span></h3>
						<div class="fashny-grids-inf row">
						
						
<?php 
include"./includes/dbconnect.php";

$sql="SELECT * FROM business_category";

$res=mysqli_query($con,$sql);

if(mysqli_num_rows($res)>0){
	
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
		extract($row);
		
		?>
		<div class="fashion-gd-1 col-lg-3 mt-4">
								<div class="fas-gallery-grid">
									<a href="./list_posts.php?business_category_name=<?php echo"$business_category_name"; ?>">
										<div class="content">
											<div class="content-overlay"></div>
											<img src="<?php echo"$business_category_image"; ?>" class="img-fluid" width="100%"  alt="">
											<div class="content-details fadeIn-bottom">
												<h4 class="content-title"><?php echo"$business_category_name"; ?></h4>

											</div>
										</div>
									</a>
								</div>
							</div>
		<?php
	}
	
}

?>						
						
							
					



					</div>

					</div>