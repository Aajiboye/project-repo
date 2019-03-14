<?php
session_start();
include 'inc/header.php';
include 'inc/connect.php';




?>
    <body>
        
        <!--================Header Menu Area =================-->
        <?php include 'inc/nav.php';

        if(isset($_FILES['file'])){
        	$message="";
        	$fail="";
        	  $projectTitle = $_POST['project_title'];
        	  $supervisor = $_POST['supervisor'];
        	  $description = $_POST['description'];
        	  $dateCompleted=$_POST['date_completed']; 
        	  $studentID = $_SESSION['studentID'];
			  $file=$_FILES['file'];
			  uploadfile($file,$projectTitle,$supervisor,$description, $dateCompleted, $studentID);
			}
		?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Upload Project</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="elements.html">Upload Project</a>
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
								<h2 class="mb-30 title_color" style="text-align: center;">Upload Your Projects</h2>
								<form method="POST" enctype="multipart/form-data">
								<?php 
                                    if (isset($message) && $message!=""){
                                    echo ' <div class="alert alert-success" style="margin-top:3%;">
                                             <strong>Success!</strong>'.$message.'
                                        </div>';
                                    }
                                    if (isset($fail) && $fail !=""){
                                    echo ' <div class="alert alert-danger" style="margin-top:3%;">
                                             <strong>Failed!</strong>'.$fail.'
                                        </div>';
                                    }
                                    ?>
									<label for='file'>Choose project file, only pdf files are allowed</label>
									<div class="mt-10">
										<input type="file" name="file" >
									</div>
									<div class="mt-10">
									<label for='project_title'>Project Title</label>
										<input type="text" name="project_title" placeholder="Project Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Project Title'" required class="single-input">
									</div>
										<div class="input-group-icon mt-10">
										<label for='supervisor'>Select Supervisor</label>
										<div class="icon"><i class="fa fa-user-alt" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name='supervisor'>
												<option value="0">Select Supervisor</option>
												<option value="1">Mrs Adetoba B.J</option>
												<option value="2">Dr V.A Haastrup</option>
												<option value="3">Dr Ayannuga</option>
												<option value="4">Mr. Oludipe</option>
												<option value="5">Mr. Lawal O.N</option>
												<option value="6">Mr. Shokunbi</option>
												<option value="7">Mrs. Okikiola</option>
											</select>
										</div>
									</div>
									<div class="mt-10">
									<label for='date_completed'>Date Completed</label>
										<input type="date" name="date_completed" placeholder="Date Completed" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date Completed'" required class="single-input">
									</div>
									<div class="mt-10">
									<label for='description'>Abstract</label>
										<textarea class="single-textarea" placeholder="Type Brief Project Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type Brief Project Description'" name = 'description' required></textarea>
									</div>
									
									<div class="mt-10">
										<input type="submit" name="upload"  class="btn btn-primary" style="width: 100%" value="Upload">
									</div>
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