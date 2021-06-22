<?php 
	session_start();
	include "db.php";
	if(isset($_SESSION['username'])){

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$rollnumber =  $_POST['rollnumber'];
		$id = $_SESSION['id'];
		$oldPassword = validate($_POST['oldPassword']);
		$newPassword = validate($_POST['password']);
		$cNewpassword = validate($_POST['cpassword']);

		if(empty($oldPassword)) {
			header("Location: changePassword-student?error=Old password is required");
			exit();	
		}else if(empty($newPassword)) {
			header("Location: changePassword-student?error=Please enter New password");
			exit();
		}else if(empty($cNewpassword)) {
			header("Location: changePassword-student?error=Please enter conform new password");
			exit();
		}else{
			
			if($newPassword == $cNewpassword){
				$sql_student = "SELECT * FROM students WHERE username='".$rollnumber."'";
				$result_stuednt = mysqli_query($conn, $sql_student);

				if(mysqli_num_rows($result_stuednt) == 1){

					$row = mysqli_fetch_assoc($result_stuednt);
					if($row['username'] === $rollnumber && $row['passwords'] === $oldPassword){
						
						$update_studentPass = "UPDATE `students` SET passwords = '".$newPassword."' WHERE username = '".$rollnumber."'";

						if(mysqli_query($conn,$update_studentPass)){
							header("Location: changePassword-student?success=Password Updated successfully");
							exit();
						}else{
							header("Location: changePassword-student?error=Error in connecting DataBase");
							exit();
						}
						

					}else{
						header("Location: changePassword-student?error=Please enter Vaild Old password");
						exit();

					}
				}
			}else{
				header("Location: changePassword-student?error=New password and Conform New password must be same");
				exit();
			}
			

		}



	}else{
		header("Location: index"); 
		exit();
	}


?>