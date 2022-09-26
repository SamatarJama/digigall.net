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
    
    </head>

    <body class="body-wrapper static">
        <div class="se-pre-con"></div>
        <div class="main-wrapper">    
        
            <header id="pageTop" class="header">
            
                <?php include SITE_DIR . '/header.php'; ?>  
                
            </header> 
     
            <section class="clearfix homeGallery padding gallery-v1">
               <div class="container"> 
                    <div class="row isotopeContainer" id="container">
                    	<?php foreach( $all_images as $image ){ ?>
							
                            <div class="col-sm-3 isotopeSelector">
                                <div class="card" style="width:100%; height:250px; ">
                                    <div class="card-img">
                                        <img  src="<?php echo SITE_URL ."/".$image; ?>" alt="Image" style="width:100%; height:300px;"  >
                                        <div class="overlay-content">
                                            <a href="<?php echo SITE_URL ."/".$image; ?>" data-fancybox="images" >
                                                <h5><i class="fa fa-plus" aria-hidden="true"></i></h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>	
							
						<?php } ?> 
                    </div>
               </div>
            </section> 
         </div>   
        
        <!-- FOOTER -->
        <?php include SITE_DIR . '/footer.php'; ?>  
        
	</body>
</html>