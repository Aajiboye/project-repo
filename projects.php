<?php 
session_start();
	include 'inc/connect.php'; 
    include 'inc/header.php';
    if(!isset($_SESSION['studentID'])){
		echo '<script>window.alert("You have to login first!")
				window.location.href="login.php";
			</script>';

	}

	$allprojects ="select a.fld_projecttitle, a.fld_projectid, a.fld_supervisor,a.fld_description,  a.fld_filename,b.fld_firstname,b.fld_lastname,b.fld_matricno from tbl_projects as a inner join tbl_users as b on b.fld_id = a.fld_studentID where a.fld_status = 1";
		$allprojects=$conn->query($allprojects);

    $getmyprojects = "select * from tbl_projects where fld_studentID = ".$_SESSION['studentID'];
    $getmyprojects=$conn->query($getmyprojects);
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
						<h2>Projects</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="elements.html">Projects</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        <!--================Team Area =================-->
        <section class="team_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Your Projects</h2>
   
        		</div>
        		<div class="row latest_blog_inner">
        		<?php
        		if($getmyprojects->num_rows>0){
        			while($getprojects=$getmyprojects->fetch_assoc()){
        			$supervisor=getsupervisor($getprojects['fld_supervisor']);
        			if($getprojects['fld_status'] == 0){
        				$status = "Not Approved";
        				}
        			else 
        				$status = "Approved";        			
        			echo '
        			<div class="col-lg-3 col-md-6">
        				<div class="l_blog_item">
        					<a class="date" href="#">'.$getprojects['fld_datecompleted'].'  |  Supervised By: '.$supervisor.'</a>
        					<h4>'.$getprojects['fld_projecttitle'].' </h4>
        					<p>'.$getprojects['fld_description'].'</p>
        					<p><b> Status: '.$status.'</b></p>
        				</div>
        			</div>
        			';
        		}
        		}
        		else 

        			echo '<div class="alert alert-warning" style="margin-top:3%; width:100%;">
                                             <strong>No Projects to show!</strong>
                                             <p>Upload a project to get started! </p>
                                        </div>';
        			
        		?>
        		
        		</div>	
        	</div>
        </section>
        <!--================End Team Area =================-->

        
        <!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
        		<div class="main_title">
        			<h2>Latest Projects</h2>
        			
        		</div>
        		<div class="row latest_blog_inner">
        			<?php
        			$file=scandir("uploads");
		        		while($getallprojects=$allprojects->fetch_assoc()){    
		        		$filename=$getallprojects['fld_filename'];
		              	$arraykey=array_search("$filename",$file);  			
		              	$fullname = ucfirst($getallprojects['fld_firstname'])." ".ucfirst($getallprojects['fld_lastname']);
		              	$supervisor=getsupervisor($getallprojects['fld_supervisor']);
		        			echo '
		        			<div class="col-lg-3 col-md-6">
		        				<div class="l_blog_item">
		        					<a class="date" href="#">Supervisor :'.$supervisor.'  |  Project By: '.$fullname.'</a>
		        					<h4>'.$getallprojects['fld_projecttitle'].' </h4>
		        					<p>'.$getallprojects['fld_description'].'</p>
		        					<a download= "'.$file[$arraykey].'" href="uploads/'.$file[$arraykey].'"><i class="fa fa-download"></i>&nbsp;&nbsp;Download Project</a>
		        				</div>
		        			</div>
		        			';
		        		}
        			
        		?>
        			
        	</div>
			</section>
			<!-- End Sample Area -->
			<section class="impress_area p_120">
        	<div class="container">
        		<div class="impress_inner text-center">
        			<h3><?php echo 'Hello '.$_SESSION['firstname']."!";?></h3>
					<h2>Upload Your Own Project</h2>
					<!-- <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station whether that is on the deck</p> -->
					<a class="main_btn2" href="upload_project.php">Upload now</a>
        		</div>
        	</div>
        </section>
        
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