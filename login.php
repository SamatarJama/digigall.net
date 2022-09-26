<?php  
//gives access to php files
require_once "database.php"; 

if( $_SESSION["userId"] ){ 

	header("location: your-page.php?error=none");
	exit();

}


 
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
 
        <section class="clearfix formArea">
           <div class="container">
              <div class="row"> 
              
                 <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                    <div class="panel panel-default formPart">
                       <div class="panel-heading patternbg">log in your <span>account</span></div>
                       <div class="panel-body">
                          <form action="<?php echo SITE_URL;?>/login2.php" method="POST">
                             <div class="form-group">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input type="text" class="form-control"  placeholder="Username" name="username" required>
                             </div>
                             <div class="form-group">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control"   placeholder="Password" name="password" required>
                             </div>
                              
                             <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button> 
                             
                          </form>
                          
							<?php
                            if (isset($_GET["error"])) {
                            	if ($_GET['error']=='nomatch') {
							?>	
                            	<br>
								<div class="alert alert-danger   alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>Wrong</strong> username or password. 
                                </div>
							
							<?php		
                            	}
                            }
                            ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-default formPart">
                       <div class="panel-heading patternbg">Create an <span>account</span></div>
                       <div class="panel-body">
                          <form action="<?php echo SITE_URL;?>/register2.php" method="POST">
                             <div class="form-group">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required>
                             </div>
                             <div class="form-group">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                             </div>
                             <div class="form-group">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input type="text" class="form-control"   placeholder="Username" name="username" required>
                             </div>
                             <div class="form-group">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="pwd1" placeholder="Password" name="password" required>
                             </div>
                             <div class="form-group">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control" placeholder="Retype password" name="password2" required>
                             </div>
                             
                             <button type="submit" name="submit" class="btn btn-primary btn-block">Sign UP</button>
                          </form>
                          
                          <?php
							if (isset($_GET["error"])) {
								if ($_GET['error']=='dataexist') {
								?>
                                	<br>
									<div class="alert alert-danger   alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <strong>Username or email</strong> have been used before!
                                    </div>
								
								<?php 
								} elseif ($_GET['error'] =='dissimilarpassword') { ?>
                                	<br>
                                    <div class="alert alert-danger   alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <strong>Passwords</strong> don't match!
                                    </div> 
                                <?php     
								}
							}
						 ?>
                          
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </section> 
     </div>   
        
        <!-- FOOTER -->
        <?php include SITE_DIR . '/footer.php'; ?>  
        
	</body>
</html>