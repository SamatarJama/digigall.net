<?php
require_once "database.php";
if( $_SESSION["userId"] ){ 

	header("location: your-page.php?error=none");
	exit();

} else {
	
	header("location: login.php");
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
                   
                  </div>
               </div>
            </section> 
         </div>   
        
        <!-- FOOTER -->
        <?php include SITE_DIR . '/footer.php'; ?>  
        
	</body>
</html>