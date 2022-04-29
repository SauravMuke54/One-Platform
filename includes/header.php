<?php
if(session_status()!=PHP_SESSION_ACTIVE){
session_start();
}
?>
<!-- Headers-4 block -->
<section class="w3l-header-6-main mobile-header">
    <div class="header-section-hny">
        <div class="header-top header-part-2">
            <div class="container">
                <!-- /header-top-inn-->
                <div class="header-inn-top">
                    <div class="logo-brand text-center">
                        <a class="nav-brand" href="index.php">
                            <img src="images/logo.png" alt="" title="" style="max-height:80px;width:400px;" />
                        </a>
                    </div>

                </div>
                <!-- //header-top-inn-->
            </div>
        </div>
        <header class="header-hny-block">
            <div class="container">
                <!-- /.nav-collapse -->
                <nav class="navbar navbar-expand-lg navbar-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-lg-auto">

       <?php 
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    ?>
     <li class="nav-item">
                                <a class="nav-link" href="add_businesses.php">Add Businesses</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="my_businesses.php">My Businesses</a>
                            </li>
                            
    <li class="nav-item">
                                <a class="nav-link" href="add_post.php">Add Post</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="my_posts.php">My Posts</a>
                            </li>
                            <li class="nav-item">
								<a class="nav-link" href="logout.php">Logout</a>
						   </li>
                         
    <?php
}else{
    ?>
    <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            
                              <li class="nav-item">
								<a class="nav-link" href="index.php#categories">Categories</a>
						   </li>
                         
                            
                            <li class="nav-item">
								<a class="nav-link" href="login.php">Login</a>
						   </li>
                           <li class="nav-item">
								<a class="nav-link" href="register.php">Register</a>
						   </li>
    <?php
}
?>       
                            
                        </ul>
                     
                            
                    </div>
                </nav>
                <!-- /.nav-collapse -->
            </div>

        </header>
    </div>

</section>
<!--w3l-banner-slider-main-->