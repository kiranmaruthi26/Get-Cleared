<?php 
	session_start();
	include "db.php";
	if(isset($_SESSION['faculty_id'])){

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$faculty_id =  $_POST['faculty_id'];
		$id = $_SESSION['id'];
		$oldPassword = validate($_POST['oldPassword']);
		$newPassword = validate($_POST['password']);
		$cNewpassword = validate($_POST['cpassword']);

		if(empty($oldPassword)) {
			header("Location: changePassword-faculty.php?error=Old password is required");
			exit();	
		}else if(empty($newPassword)) {
			header("Location: changePassword-faculty.php?error=Please enter New password");
			exit();
		}else if(empty($cNewpassword)) {
			header("Location: changePassword-faculty.php?error=Please enter conform new password");
			exit();
		}else{
			
			if($newPassword == $cNewpassword){
				$sql_faculty = "SELECT * FROM faculty WHERE faculty_id='".$faculty_id."'";
				$result_faculty = mysqli_query($conn, $sql_faculty);

				if(mysqli_num_rows($result_faculty) == 1){

					$row = mysqli_fetch_assoc($result_faculty);
					if($row['faculty_id'] === $faculty_id && $row['password'] === $oldPassword){
						
						$update_facultyPass = "UPDATE `faculty` SET password = '".$newPassword."' WHERE faculty_id = '".$faculty_id."'";

						if(mysqli_query($conn,$update_facultyPass)){
							header("Location: changePassword-faculty.php?success=Password Updated successfully");
							exit();
						}else{
							header("Location: changePassword-faculty.php?error=Error in connecting DataBase");
							exit();
						}
						

					}else{
						header("Location: changePassword-faculty.php?error=Please enter Vaild Old password");
						exit();

					}
				}
			}else{
				header("Location: changePassword-faculty.php?error=New password and Conform New password must be same");
				exit();
			}
			

		}



	}else{
		header("Location: index.php"); 
		exit();
	}


?>