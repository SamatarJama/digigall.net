<?php
//gives access to php files
require_once "database.php";

$all_images	=	"";
if(isset($_SESSION["userId"])) {

  $username = $_SESSION["usersName"];
  require("checker.php");
  $all_images	=	get_images($conn, $username);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <?php include SITE_DIR . '/head.php'; ?>

        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/css/dropify.min.css">

    </head>

    <body class="body-wrapper static">
        <div class="se-pre-con"></div>
        <div class="main-wrapper">

            <header id="pageTop" class="header">

                <?php include SITE_DIR . '/header.php'; ?>

            </header>

            <section class="clearfix userSection  ">
        		<div class="container">
                	<div class="profile">
                  		<div class="row">
                        	<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-3">

                                <form action="upload.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                                	<div class="form-group">
                                    	<div class="col-md-12 col-sm-12 ">
                                        	<h5>Upload Your Images</h5>
                                        	<input type="File" class="dropify" name="file" required multiple></input>
                                    	</div>
                                  	</div>
                                    <div class="form-group">
                                    	<div class=" col-md-2 col-sm-3">
                                          <button type="submit" name="submit" class="btn btn-primary btn-block">upload</button>
                                        </div>
                                   	</div>
								</form>
							</div>
                        </div>
					</div>
                </div>
			</section>

            <section class="clearfix homeGallery padding gallery-v1">
               <div class="container">
                    <div class="row isotopeContainer" id="container">
                    	<?php foreach( $all_images as $image ){ ?>

                            <div class="col-sm-4 isotopeSelector">
                            	<div class="card" style="width:100%; height:250px; ">
                                    <div class="card-img">
                                        <img  src="<?php echo SITE_URL ."/".$image; ?>" alt="Image" style="width:100%; height:300px;"  >
                                        <div class="overlay-content">
                                            <a href="<?php echo SITE_URL; ?>/delete.php?image=<?php echo $image; ?>"   >
                                                <h5><i class="fa fa-remove" aria-hidden="true"></i></h5>
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
