<section class="w3l-banner-slider2-main">
	<div class="container-fluid">
			<div id="example2" class="slider-pro">
					<div class="sp-slides">
						<div class="sp-slide">
								<a href="#">
									<img class="sp-image" src="assets/images/grid13.jpg" class="img-fluid" alt="" 
									data-src="assets/images/grid13.jpg" 
									data-retina="assets/images/grid13.jpg"/>
							</a>
							<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid10.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid10.jpg" 
										data-retina="assets/images/grid10.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid11.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid11.jpg" 
										data-retina="assets/images/grid11.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid5.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid5.jpg" 
										data-retina="assets/images/grid5.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid16.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid16.jpg" 
										data-retina="assets/images/grid16.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid18.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid18.jpg" 
										data-retina="assets/images/grid18.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid4.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid4.jpg" 
										data-retina="assets/images/grid4.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid12.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid12.jpg" 
										data-retina="assets/images/grid12.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid5.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid5.jpg" 
										data-retina="assets/images/grid5.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
			
						<div class="sp-slide">
								<a href="#">
										<img class="sp-image" src="assets/images/grid16.jpg" class="img-fluid" alt="" 
										data-src="assets/images/grid16.jpg" 
										data-retina="assets/images/grid16.jpg"/>
								</a>
								<p class="sp-caption">Lorem ipsum dolor sit amet.</p>
						</div>
	
			

					</div>
				</div>
	</div>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/sliderPro.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function( $ ) {
			$( '#example2' ).sliderPro({
				width: '50%',
				height: 500,
				aspectRatio: 1.5,
				visibleSize: '100%',
				forceSize: 'fullWidth'
			});
	
			// instantiate fancybox when a link is clicked
			$( '#example2 .sp-image' ).parent( 'a' ).on( 'click', function( event ) {
				event.preventDefault();
	
				// check if the clicked link is also used in swiping the slider
				// by checking if the link has the 'sp-swiping' class attached.
				// if the slider is not being swiped, open the lightbox programmatically,
				// at the correct index
				if ( $( '#example2' ).hasClass( 'sp-swiping' ) === false ) {
					$.fancybox.open( $( '#example2 .sp-image' ).parent( 'a' ), { index: $( this ).parents( '.sp-slide' ).index() } );
				}
			});
		});
	</script>
</section>