<?php 

include "db.php";

if(isset($_POST['fname']) && isset($_POST['f_id']) && isset($_POST['fpassword']) && isset($_POST['fcpassword'])&& isset($_POST['course'])){


		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		/*function function_alert($message) {
      
    		// Display the alert box 
    		echo "<script>alert('$message');</script>";
		}*/
		$name = validate($_POST['fname']);
		$fac_id = validate($_POST['f_id']);
		$pass = validate($_POST['fpassword']);
		$cpass = validate($_POST['fcpassword']);
		$course = validate($_POST['course']);
		$phonenumber = "+91".validate($_POST['fphonenumber']);
		$email = validate($_POST['femail']);

		if(empty($name)){
			header("Location: index.php?invalid=Name is required");
			exit();	

		}elseif(empty($fac_id)){
			header("Location: index.php?invalid=Faculty ID is required");
			exit();	

		}elseif ($course == 'selectCourse') {
			header("Location: index.php?invalid=Please select the course your handling");
			exit();	
		}elseif(empty($pass)){
			header("Location: index.php?invalid=password is required");
			exit();	

		}elseif(empty($cpass)){
			header("Location: index.php?invalid=Confrom password is required");
			exit();	

		}
		else{

			$check_user = "SELECT * FROM faculty WHERE faculty_id='".$fac_id."' ";
			$status = mysqli_query($conn,$check_user);

			if(mysqli_num_rows($status) >=1){
				header("Location: index.php?error=User already exist..! Try login");
				exit();
			}
			else{
				if($pass === $cpass){
					$insert = "INSERT INTO faculty(faculty_id,name,course,phonenumber,email,password,`datetime`) VALUES('$fac_id','$name','$course','$phonenumber','$email','$pass',NOW())";
					// Function call
					//function_alert("Account Successfully Created..!");
					if(mysqli_query($conn,$insert)){
						header("Location: index.php?success=Account created Successfully");
					}else{
						header("Location: index.php?error=Error in conneting DataBase");
					}
				}else{
					header("Location: index.php?invalid=password and Conform password should be same");
					exit();	
				}

			}


		}
}
else{
	header("Location: index.php?");
	exit();	
}


?>