<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_POST['mTitle']) && isset($_POST['description'])){
	include "../db.php";
	$mTitle = $_POST['mTitle'];
	$description = $_POST['description'];
	$section = $_SESSION['section'];
	$faculty_id = $_SESSION['faculty_id'];
	$course = $_SESSION['course'];
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$mTitle = validate($mTitle);
	$description = validate($description);

	if(empty($mTitle)){
		header("Location: courseModule.php?error=Module Title is required");
		exit();
	}else if(empty($description)){
		header("Location: courseModule.php?error=discription is required");
		exit();
	}else{
		// $_FILES['file']['name'] =strtolower($_FILES["file"]["name"]);

		$fullFileName =$_FILES["file"]["name"];
		$tmepName = $_FILES["file"]["tmp_name"];
		$fileType = ltrim($_FILES["file"]["type"],"image/");
		$uploads_dir = 'modulelogos';
		$deforeFileName = substr($fullFileName, 0, strpos($fullFileName, '.'));
		//$title_modified = 	substr_replace(' ', ' _', $mTitle);
		$newFileName = uniqid("",true).'-'.$faculty_id.''.ltrim($fullFileName,$deforeFileName);
		//print_r($_FILES['file']);
		//echo $newFileName;

		if($fileType == "png" || $fileType == "jpg" || $fileType == "JPEG" || $fileType == "JPG" || $fileType == "jpeg"){
			/*echo $newFileName;
			echo "\n".$fileType;*/
			move_uploaded_file($tmepName, $uploads_dir.'/'.$newFileName);

			//creat new table
			$tablename = "livedb_".rand(100000,999999).'_'.$faculty_id;
			
			$creatTable = "CREATE TABLE `u628814859_getcleared`.`".$tablename."` ( 
			`id` INT NOT NULL AUTO_INCREMENT , 
			`title` VARCHAR(300) NOT NULL , 
			`description` VARCHAR(1000) NOT NULL , 
			`sessionLink` VARCHAR(100) NOT NULL , 
			`startdate` DATE NOT NULL , 
			`enddate` DATE NOT NULL , 
			`startTime` TIME NOT NULL , 
			`endTime` TIME NOT NULL , 
			`scheduledOn` DATETIME NOT NULL , 
			PRIMARY KEY (`id`)) ENGINE = InnoDB;";
			
			//echo $creatTable;
			//print_r(mysqli_query($conn,$creatTable));
			
			if(mysqli_query($conn,$creatTable)){


				//write to coursemodule table

				$insert_TableData = "INSERT INTO `coursemodule` (`faculty_id`,`title`,`description`,`course`,`section`,`logo_img`,`newtablename`,`datetime`) VALUES ('$faculty_id','$mTitle','$description','$course','$section','$newFileName','$tablename',NOW())";
				if(mysqli_query($conn,$insert_TableData)){
					header("Location: courseModule.php?success=Module Created");
					exit();
				}else{
					header("Location: courseModule.php?error=Error in creating Module,Please try agian");
					exit();
				}

			}else{
				header("Location: courseModule.php?error=Error While Creating table, please contact admin");
				exit();
			}
			


		}else{
			header("Location: courseModule.php?error=Invalid file type or file size exceeded");
			exit();
		}

	}	

}else{
	header("Location:../index.php");
	exit();
}
?>