<!DOCTYPE html>
<html>
<head>
	<title>Forgetpassowrd - GetCleared</title>
	<link rel="stylesheet" type="text/css" href="./css/style_forgetpass.css">
	<link rel="icon"  href="./images/icon.png">
</head>
<body>
	<section class="mainSection">
	    <?php if(isset($_GET['error'])){?>
                <div class="error">
                    <span onclick="this.parentElement.style.display='none';">&times;</span>
                    <p style="text-align:center;"><?php echo $_GET['error'] ;?></p>
                </div>
            <?php }?>
		<section class="forgetpassForm">
			<form method="post" action="">
				<div class="headDiv">
					<h1>Get Cleared</h1>
				</div>
				<div>
					<h4>Please enter your username to reset your password</h4>
				</div>
				<div class="inputuserdiv">
					<input type="text" name="username" placeholder="Username" id="username" required="Username">
					<button type="submit" name="sendOtp" id="sendOtp">Send OTP</button>
				</div>
			</form>
		</section>
	</section>

</body>
</html>

<?php 
    if(isset($_POST['sendOtp'])){
        include "db.php";
        
        function sendEmail($toMail,$name,$vkey,$uname,$maskedEmail){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "support@getcleared.in";
            $to = $toMail;
            $subject = "GetCleared Password reset verification";
            $message = "<h2>Email verification - GetCleared</h2>
            <h2>Hello $name</h2>
            <h3>Your Six digit OTP for GetCleared Account Password reset is $vkey</h3>
            <h5>For any support revert back to this mail</h5>
            <p>With Regards</p>
            <p>Kiran Maruthi Kuna</p>
            <p>Developer - getcleared.in</p>";
            $headers = "From:" . $from."\r\n";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
            if(mail($to,$subject,$message, $headers)) {
        		header("Location: reset_password?uname=$uname &maskmail=$maskedEmail");
			    exit();	
            } else {
            	header("Location: index?error=Verification Email not sent");
			    exit();	
            }
        }
        
        
        function Maskemail($email)
        {
            $em   = explode("@",$email);
            $name = implode('@', array_slice($em, 0, count($em)-1));
            $len  = floor(strlen($name)/2);
        
            return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
        }
        
        
        $username = $_POST['username'];
        $otp = rand(100000,999999);
        
        $student_sql = "SELECT * FROM `students` WHERE `username`='".$username."' ";
        //$faculty_sql = "SELECT * FROM `faculty` WHERE `facutly_id`= '".$username."' ";
        $faculty_sql ="SELECT * FROM faculty WHERE faculty_id='".$username."'";
        $result_student = mysqli_query($conn,$student_sql);
        $result_faculty = mysqli_query($conn,$faculty_sql);
        
        if(mysqli_num_rows($result_student) == 1){
            
            $row = mysqli_fetch_assoc($result_student);
            
            if($row['username'] == $username){
                $update_otp = "UPDATE students SET vkey='".$otp."' WHERE username='".$username."'";
                
                if(mysqli_query($conn,$update_otp)){
                    sendEmail($row['email'],$row['name'],$otp,$username,Maskemail($row['email']));
                }else{
                    header("Location: forgotpassword?error=OTP geration faild, Please try agian");
                }
            }
            
            
        }elseif(mysqli_num_rows($result_faculty) == 1){
            
            $row = mysqli_fetch_assoc($result_faculty);
            
            if($row['faculty_id'] == $username){
                
                $update_otp = "UPDATE faculty SET vkey='".$otp."' WHERE faculty_id='".$username."'";
                
                if(mysqli_query($conn,$update_otp)){
                    sendEmail($row['email'],$row['name'],$otp,$username,Maskemail($row['email']));
                }else{
                    header("Location: forgotpassword?error=OTP geration faild, Please try agian");
                }
            }
        
        }else{
           header("Location: forgotpassword?error=Account not found");
        }
        
        
        
    }

?>