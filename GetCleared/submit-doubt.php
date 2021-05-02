<<?php 
include "db.php";
session_start();
	
	if(isset($_SESSION['username']) && isset($_POST['course']) && isset($_POST['doubt-text'])){

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$rollnumber =$_SESSION['username'];
		$course = $_POST['course'];
		$doubt = validate($_POST['doubt-text']);

		if($course == 'emptyValue'){
			header("Location: Ask-doubt.php?error=Course selection required");
			exit();
		}/*else if(empty($files)){
			header("Location: Ask-doubt.php?error=File selection required");
			exit();
		}*/else if(empty($doubt)){
			header("Location: Ask-doubt.php?error=Doubt field is required");
			exit();
		}else{

			// File upload path
			$fullFileName =$_FILES["file"]["name"];
			$tmepName = $_FILES["file"]["tmp_name"];
			$fileType = $_FILES["file"]["type"];
			$uploads_dir = 'student_uploads';
			$deforeFileName = substr($fullFileName, 0, strpos($fullFileName, '.'));
            $newFileName = uniqid("",true).'-'.$rollnumber.''.ltrim($fullFileName,$deforeFileName);
			move_uploaded_file($tmepName, $uploads_dir.'/'.$newFileName);
			date_default_timezone_set("Asia/Kolkata");
			$time = date("h:i:s");
			$date = date("Y-m-d");
			$dateTime = $date." ".$time;

			$insert = "INSERT INTO `student_doubt` (`rollnumber`, `course`, `images`, `doubt`,`datetime`) VALUES ('$rollnumber', '$course', '$newFileName', '$doubt',NOW())";
			if($insert){

			mysqli_query($conn,$insert);

			header("Location: home-student.php?success=Thankyou, Your doubt was submitted successfully with GetCleared");
			}else{
				echo "Error in connectig to form";
			}
		}



	}else{

		header("Location: Ask-doubt.php?error=returning back");
		exit();	
	}


 ?>