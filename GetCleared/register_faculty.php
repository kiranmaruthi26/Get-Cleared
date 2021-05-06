<?php 

include "db.php";

if(isset($_POST['fname']) && isset($_POST['f_id']) && isset($_POST['fpassword']) && isset($_POST['fcpassword'])&& isset($_POST['course'])){


        function sendEmail($toMail,$name,$vkey){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "support@getcleared.in";
            $to = $toMail;
            $subject = "GetCleared Faculty Account verification";
            $message = "<h2>Email verification - GetCleared</h2>
            <h2>Hello $name</h2>
            <h3>Your Six digit OTP for GetCleared Faculty Account verification is $vkey</h3>
            <h5>For any support revert back to this mail</h5>
            <p>With Regards</p>
            <p>Kiran Maruthi Kuna</p>
            <p>Developer - getcleared.in</p>";
            $headers = "From:" . $from."\r\n";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
            if(mail($to,$subject,$message, $headers)) {
        		header("Location: emailverification.php?email=$toMail");
			    exit();	
            } else {
            	header("Location: index.php?error=Verification Email not sent");
			    exit();	
            }
        }
        
        
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
				    $vkey = rand(100000,999999);
					$insert = "INSERT INTO faculty(faculty_id,name,course,phonenumber,email,password,vkey,`datetime`) VALUES('$fac_id','$name','$course','$phonenumber','$email','$pass','$vkey',NOW())";
					// Function call
					//function_alert("Account Successfully Created..!");
					if(mysqli_query($conn,$insert)){
					    sendEmail($email,$name,$vkey);
						//header("Location: index.php?success=Account created Successfully");
					}else{
						header("Location: index.php?error=Error in conneting DataBase");
					}
				}else{
					header("Location: index.php?error=password and Conform password should be same");
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