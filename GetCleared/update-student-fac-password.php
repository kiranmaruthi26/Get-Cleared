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

		$rollnumber =  validate($_POST['rollnumber']);
		$id = $_SESSION['id'];
		$newPassword = validate($_POST['password']);
		$cNewpassword = validate($_POST['cpassword']);

		if(empty($rollnumber)){
			header("Location: changeStudent_password?error=Please enter a Roll Number");
			exit();	
		}else if(empty($newPassword)) {
			header("Location: changeStudent_password?error=Please enter New password");
			exit();
		}else if(empty($cNewpassword)) {
			header("Location: changeStudent_password?error=Please enter conform new password");
			exit();
		}else{
			
			if($newPassword == $cNewpassword){
				$sql_student = "SELECT * FROM students WHERE username='".$rollnumber."'";
				$result_stuednt = mysqli_query($conn, $sql_student);

				if(mysqli_num_rows($result_stuednt) == 1){

					$row = mysqli_fetch_assoc($result_stuednt);
					if($row['username'] === $rollnumber){
						
						$update_studentPass = "UPDATE `students` SET passwords = '".$newPassword."' WHERE username = '".$rollnumber."'";

						if(mysqli_query($conn,$update_studentPass)){
							header("Location: changeStudent_password?success=Password Updated successfully");
							exit();
						}else{
							header("Location: changeStudent_password?error=Error in connecting DataBase");
							exit();
						}
						

					}

				}else{
					header("Location: changeStudent_password?error=Please enter Vaild Roll Number");
						exit();
				}
			}else{
				header("Location: changeStudent_password?error=New password and Conform New password must be same");
				exit();
			}
			

		}



	}else{
		header("Location: index"); 
		exit();
	}


?>