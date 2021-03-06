<?php 
	include 'inc/connect.php'; 
	//login
   
	if(isset($_POST['login'])){
    session_start();
    $matric_no=strtolower($_POST['matric_no']);
    $surname=strtolower($_POST['surname']);
    //validate username and password from db
    $query = "select * from tbl_users where fld_matricno = '".$matric_no."' and fld_lastname= '".$surname."'";
    $getuser=$conn->query($query);
    if($getuser->num_rows > 0){
       print_r($getuser=$getuser->fetch_assoc()) ;
        $_SESSION['studentID'] = $getuser['fld_id'];
        $_SESSION['matric_no'] = strtoupper($getuser['fld_matricno']);
        $_SESSION['firstname'] = ucfirst($getuser['fld_firstname']);
        $_SESSION['fullname'] = ucfirst($getuser['fld_lastname'])." ".ucfirst($getuser['fld_firstname']);
        header ('location:projects.php');
        }
        else
            $fail = ' Invalid login credentials';
    }
        include 'inc/header.php';
?>
    <body>
        
        <!--================Header Menu Area =================-->
        <?php include 'inc/nav.php';?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Log in</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="elements.html">Log in</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        
        <!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
				<div class="row">
				<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
								<h2 class="mb-30 title_color" style="text-align: center;">Welcome</h2>
								<h3 class="mb-30 title_color" style="text-align: center;">Login to continue</h3>
								<form  method="post">
									<div class="mt-10">
										<input type="text" name="matric_no" placeholder="Matric Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="password" name="surname" placeholder="Surname" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
									</div>
									<?php 
                                    if (isset($fail)){
                                    echo ' <div class="alert alert-danger" style="margin-top:3%;">
                                             <strong>Failed!</strong>'.$fail.'
                                        </div>';
                                    }
                                    ?>
									<div class="mt-10">
										<button type="submit" name="login"  class="btn btn-primary" style="width: 100%">log in</button>
									</div>
                                    <p>Don't have an account yet? Register <a href="signup.php">here</a></p>
								</form>
						</div>
						<div class="col-lg-2"></div>
					</div>
				</div>
			</section>
			<!-- End Sample Area -->
			
        
        <!--================ start footer Area  =================-->	
        <?php include 'inc/footer.php';?>
		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>