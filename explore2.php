<?php 
require_once "database.php"; 
$username = $_SESSION["usersName"];
require("checker.php");
$all_images	=	get_all_images($conn, $username);
 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
    
        <?php include SITE_DIR . '/head.php'; ?> 
        
        <style>
			.owl-carousel .owl-item { max-height: 300px; }
			
			.owl-carousel .owl-item img {
				height: 300px;
			}
			  
		</style>
    
    </head>

    <body class="body-wrapper static">
        <div class="se-pre-con"></div>
        <div class="main-wrapper">    
        
            <header id="pageTop" class="header">
            
                <?php include SITE_DIR . '/header.php'; ?>  
                
            </header>
            <br><br>
            <section class="clearfix brandArea patternbg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="owl-carousel partnersLogoSlider">
                            	<?php foreach( $all_images as $image ){ ?>
                                    <div class="slide">
                                        <div class="partnersLogo clearfix">
                                            <img src="<?php echo SITE_URL ."/".$image; ?>" alt="Image Partner" style="width: 100% !important;">
                                        </div>
                                    </div>
                              	<?php } ?>        
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
         </div>   
        
        <!-- FOOTER -->
        <?php include SITE_DIR . '/footer.php'; ?>  
        
        <script>
		 
			$('.owl-carousel').owlCarousel({
				items:4,
				nav:true, 
				loop:true,
				dots: false,
				margin:10, 
				 
			}) 
		
		</script>
        
        
	</body>
</html>