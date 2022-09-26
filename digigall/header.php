<!-- TOP INFO BAR -->
<div class="top-info-bar">
    <div class="container">
    </div>
</div>

<!-- NAVBAR -->
<nav id="menuBar" class="navbar navbar-default lightHeader" >
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        	<a class="navbar-brand" href="index.php"><img src="<?php echo SITE_URL; ?>/img/digigall.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">

            	<?php if( isset( $_SESSION["userId"] ) ) { ?>

                    <li class=""><a href="<?php echo SITE_URL; ?>/your-page.php"><?php echo $_SESSION["usersName"]; ?>'s page</a></li>

                    <li class=""><a href="<?php echo SITE_URL; ?>/explore.php">Explore</a></li

                    <li class=""><a href="<?php echo SITE_URL; ?>/logout.php">Log out</a></li>

				<?php } else { ?>

                    <li class=""><a href="<?php echo SITE_URL; ?>/login.php">Login</a></li>

				<?php } ?>

            </ul>
        </div>

    </div>
</nav>
