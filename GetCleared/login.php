<?php
session_start();
include "db.php";
	if(isset($_POST['username']) && isset($_POST['password'])){


		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$uname = validate($_POST['username']);
		$pass = validate($_POST['password']);

		if(empty($uname)){
			header("Location: index.php?error=User Name is required");
			exit();	

		}else if(empty($pass)){
			header("Location: index.php?error=Password is required");
			exit();

		}else{
			$sql_student = "SELECT * FROM students WHERE username='".$uname."' OR passwords='".$pass."'";
			$sql_fac ="SELECT * FROM faculty WHERE faculty_id='".$uname."' OR password='".$pass."'";

			$result_stuednt = mysqli_query($conn, $sql_student);
			$result_fac = mysqli_query($conn,$sql_fac);
			if(mysqli_num_rows($result_stuednt) == 1){
				
				$row = mysqli_fetch_assoc($result_stuednt);

				if($row['username'] === $uname && $row['passwords'] === $pass){

					$_SESSION['username'] = $row['username'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['name'] = $row['name'];
					header("Location: home-student.php");
					exit();

				}else{
					header("Location: index.php?error=Incorrect username or Password");
					exit();
				}
			}elseif(mysqli_num_rows($result_fac)==1){
				$row = mysqli_fetch_assoc($result_fac);

				if($row['faculty_id'] === $uname && $row['password'] === $pass){
					$_SESSION['faculty_id'] = $row['faculty_id'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['fname'] = $row['name'];
					$_SESSION['course'] = $row['course'];
					header("Location: home-faculty.php");
					exit();
				}else{
					header("Location: index.php?error=Incorrect username or Password");
					exit();
				}
			}
			else{
				header("Location: index.php?error=User doesn't exist");
				exit();
			}
		}

	}else{
		header("Location: index.php?");
		exit();	
	}
 ?>