<?php 
include "db.php";
session_start();
	
	if(isset($_POST['question_no']) && isset($_POST['solution_text'])){

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$faculty_id = $_SESSION['faculty_id'];
		$solution = $_POST['solution_text'];
		$problem_id = $_POST['question_no'];

		if(empty($solution)){
			header("Location: submit-solution.php?error=solution field is required");
			exit();
		}else{

			// File upload path
			$fullFileName =$_FILES["file"]["name"];
			$tmepName = $_FILES["file"]["tmp_name"];
			$fileType = $_FILES["file"]["type"];
			$uploads_dir = 'faculty_uploads';
			$newFileName = uniqid("",true).'-'.$faculty_id.'.'.ltrim($fileType,"image/");
			move_uploaded_file($tmepName, $uploads_dir.'/'.$newFileName);
			date_default_timezone_set("Asia/Kolkata");
			$time = date("h:i:s");
			$date = date("Y-m-d");
			$dateTime = $date." ".$time;

			$insert = "INSERT INTO `faculty_solution` (`problem_id`, `faculty_id`, `image`, `solution`,`datetime`) VALUES ('$problem_id', '$faculty_id', '$newFileName', '$solution',NOW())";
			if($insert){

			mysqli_query($conn,$insert);

			header("Location: submit-solution.php?success=Thankyou, Your Solution was submitted successfully with GetCleared");
			}else{
				echo "Error in connectig to form";
			}
		}



	}else{

		header("Location: submit-solution.php?error=returning back");
		exit();	
	}


	
 ?>