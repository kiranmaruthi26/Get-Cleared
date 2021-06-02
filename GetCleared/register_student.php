<?php 

include "db.php";

if(isset($_POST['name']) && isset($_POST['rollnumber']) && isset($_POST['password']) && isset($_POST['cpassword'])){
        
        function sendEmail($toMail,$name,$vkey){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "support@getcleared.in";
            $to = $toMail;
            $subject = "GetCleared Student Account verification";
            $message = "<h2>Email verification - GetCleared</h2>
            <h2>Hello $name</h2>
            <h3>Your Six digit OTP for GetCleared Account verification is $vkey</h3>
            <h5>For any support revert back to this mail</h5>
            <p>With Regards</p>
            <p>Kiran Maruthi Kuna</p>
            <p>Developer - getcleared.in</p>";
            
            $headers = "X-Priority: 1 (Highest)";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers = "From:" . $from."\r\n";
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
		$name = validate($_POST['name']);
		$roll = validate($_POST['rollnumber']);
		$pass = validate($_POST['password']);
		$cpass = validate($_POST['cpassword']);
		$phonenumber = "+91".validate($_POST['phonenumber']);
		$email = validate($_POST['email']);
		$vkey = rand(100000,999999);
		$section = $_POST['section'];

		if(empty($name)){
			header("Location: index.php?error=Name is required");
			exit();	

		}elseif(empty($roll)){
			header("Location: index.php?error=Roll Number is required");
			exit();	

		}elseif(empty($pass)){
			header("Location: index.php?error=password is required");
			exit();	

		}elseif(empty($cpass)){
			header("Location: index.php?error=Confrom password is required");
			exit();	

		}else{

			$check_user = "SELECT * FROM students WHERE username='".$roll."' ";
			$status = mysqli_query($conn,$check_user);

			if(mysqli_num_rows($status) >=1){
				header("Location: index.php?error=User already exist..! Try login");
				exit();
			}

			else{
				if($pass === $cpass){
				$insert = "INSERT INTO students(username,passwords,name,phonenumber,email,section,vkey,`datetime`) VALUES('$roll','$pass','$name','$phonenumber','$email','$section','$vkey',NOW())";
				// Function call
				//function_alert("Account Successfully Created..!");
					if(mysqli_query($conn,$insert)){
					    sendEmail($email,$name,$vkey);
						//header("Location: index.php?success=Account Created Successfully");
					}else{
						header("Location: index.php?error=Error in connecting DataBasa");
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