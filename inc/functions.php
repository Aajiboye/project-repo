<?php

function getactive($page){
	global $activeindex, $activesignup, $activelogin, $activesupervisors, $activeprojects;
	if (isset($page)){
	if ($page == 'index.php'){ 
		$activeindex='active';
	}
	elseif( $page == 'login.php'){
		$activelogin='active';
	}
	elseif( $page =='signup.php' ){
		$activesignup='active';
	}
	elseif( $page =='projects.php'){
		$activeprojects='active';
	}
	elseif( $page == 'supervisors'){
		$activesupervisors='active';
	}
	}
}

function uploadfile($file, $projectTitle,$supervisor,$description, $dateCompleted, $studentID){
	global $fail;
	$filename=$file['name'];
	$file_temp=$file['tmp_name'];
	$file_size=$file['size'];
	$file_error=$file['error'];
	$secret = $_SESSION['firstname'].rand(10,1000);
	$file_ext = explode('.',$filename);
	$file_ext=strtolower(end($file_ext));
	$allowed = array('pdf');
	if(in_array($file_ext,$allowed)){
		if($file_error ===0){
			if($file_size<=2097152){
				$file_name_new=$secret.'.'.$file_ext;
				$file_destination = 'uploads/'.$file_name_new;
				if(move_uploaded_file($file_temp, $file_destination)){
					insertupload($file_name_new,$projectTitle,$supervisor,$description, $dateCompleted, $studentID);
				}
			}
			else{
				$fail=" File too large";
			}
		}else{
			$fail=" Ops! something went wrong. Please try again";
		}
	}
	else{
		$fail=" Invalid file type";
	}
}

function insertupload($filename,$projectTitle,$supervisor,$description, $dateCompleted, $studentID){
	global $conn, $message;
	$stmt = "INSERT INTO tbl_projects (fld_projecttitle, fld_filename,fld_supervisor, fld_description, fld_datecompleted, fld_studentid) 
	VALUES ('$projectTitle','$filename',$supervisor,'$description', '$dateCompleted', $studentID)";
	$exstmt=$conn->query($stmt);
	  if($exstmt){
		$message = ' Upload Successful';
	}

}

function getsupervisor($id){
	
	if ($id == 1){
		$name  = 'Mrs. Adetoba';
	}
	elseif ($id == 2){
		$name  = 'Dr. Haastrup';
	}
	elseif ($id == 3){
		$name  = 'Dr. Ayannuga';
	}
	elseif ($id == 4){
		$name  = 'Mr. Oludipe';
	}
	elseif ($id == 5){
		$name  = 'Mr. Lawal O.N';
	}
	elseif ($id == 6){
		$name  = 'Mr. Shokunbi';
	}
	elseif ($id == 7){
		$name  = 'Mrs. Okikiola';
	}
	return $name;
}
?>