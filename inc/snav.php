// <?php //$page =  basename($_SERVER['PHP_SELF']);
// $activeindex = "";
// $activesignup ="";
// $activelogin ="";
// $activesupervisors="";
// $activeprojects="";
// if(isset($_SESSION['studentID'])){
// 	$status = 'log out';
// 	$url='index.php?status=logout';
// }
// else {
// 	$status= 'Log in';
// 	$url='login.php';
// 	$signup='<li class="nav-item <?php echo " ".$activesignup;?>"><a class="nav-link" href="signup.php">Sign up</a></li>';
// }
// include 'functions.php';
?>

<header class="header_area">
           	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<ul class="list header_social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>

						</ul>
					</div>
					<div class="float-right">
						<!-- <a class="dn_btn" href="tel:+4400123654896">+440 012 3654 896</a>
						<a class="dn_btn" href="mailto:support@colorlib.com">support@colorlib.com</a> -->
					</div>
           		</div>	
           	</div>	
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<?php getactive($page);	?>
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								
								<li class="nav-item <?php echo " ".$activelogin;?>"><a class="nav-link" href=<?php echo $url;?>><?php echo $status;?></a></li>

								<li class="nav-item <?php echo " ".$activesupervisors;?>"><a class="nav-link" href="supervisors.php">Supervisors</a></li> 
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>