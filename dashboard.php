<?php 
session_start();
	include 'inc/connect.php'; 
    include 'inc/header.php';

    $getmyprojects = "select a.fld_projecttitle, a.fld_projectid, a.fld_status, a.fld_filename,b.fld_firstname,b.fld_lastname,b.fld_matricno from tbl_projects as a inner join tbl_users as b on b.fld_id = a.fld_studentID where fld_supervisor= ".$_SESSION["supervisorID"];
    $getmyprojects=$conn->query($getmyprojects);
if(isset($_POST['approve'])){
	$changestatus = "UPDATE tbl_projects 
                SET 
                fld_status = 1
                WHERE fld_projectid = ".$_POST['approve'];
    $exec = $conn->query($changestatus);
    if($exec){
    	echo '<script> window.alert("Project Successfully Approved!")
		window.location.href="dashboard.php";
    	</script>';

    }
    else echo $conn->error;
}
    
    
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
						<h2>Dashboard - <?php echo $_SESSION['supervisorname'];?></h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="elements.html">Dashboard</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        
        
        <!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
				  <h2>Projects Dashboard</h2>           
				  <table class="table table-striped">
				    <thead>
				      <tr>
				        <th>#</th>
				        <th>Project Title</th>
				        <th>Student</th>
				        <th>Matric No</th>
				        <th>Status</th>
				        <th>View Project</th>
				        <th>Approve</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php
				    $i=1;
				    $file=scandir("uploads");
				    	while($projectdetails=$getmyprojects->fetch_assoc()){
				    		$filename=$projectdetails['fld_filename'];
              				$arraykey=array_search("$filename",$file);
				    		$fullname = ucfirst($projectdetails['fld_firstname'])." ".ucfirst($projectdetails['fld_lastname']);
				    		if($projectdetails['fld_status'] == 0){
				    			$status = 'unapproved';
				    			$btn = '<form method= "post"><button type="submit" name="approve" class = "btn btn-success" value = '.$projectdetails['fld_projectid'].'> Approve</button></td>
				        			</form>';
				    		}else{
				    			$status = 'approved';
				    			$btn = '<form method= "post"><button type="submit" class = "btn btn-success" disabled> Approve</button></td>
				        			</form>';
				    		} 
				    		echo '<tr>
				        			<td>'.$i.'</td>
				        			<td>'.$projectdetails['fld_projecttitle'].'</td>
				        			<td>'.$fullname.'</td>
				        			<td>'.$projectdetails['fld_matricno'].'</td>
				        			<td>'.$status.'</td>
				        			<td><a download= "'.$file[$arraykey].'" href="uploads/'.$file[$arraykey].'"><i class="fa fa-download"></i>&nbsp;&nbsp;Download Project</a></td>
				        			<td>'.$btn.'
				      			  </tr> ';
				      			  $i++;
				    	}
				    	
				    ?>
				      
				    </tbody>
				  </table>
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