<?php 

    if(isset($_GET['uname']) || isset($_GET['error'])){
    
    ?>

    <!DOCTYPE html>
    <html>
    <head>
    	<title>Reset Password</title>
    	<link rel="stylesheet" type="text/css" href="./css/style_reset_pass.css">
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
    		<form method="post" action="#" class="formSection">
    			<div class="headDiv">
    				<h1>Get Cleared</h1>
    			</div>
    			<div class="lockDiv">
    				<img src="./images/lock-icon.png">
    			</div>
    			<div>
    				<h1>Password Reset</h1>
    			</div>
    			<div class="info">
    				<h5>Please note that password must contain</h5>
    			</div>
    			<div >
    				<ul>
    					<li>At least one  number </li>
    					<li>One uppercase and lowercase letter</li>
    					<li>At least 8 or more characters</li>
    				</ul>
    			</div>
    			<?php 
    			    if(isset($_GET['maskmail'])){ ?>
    			        <div>
    			            <p>OTP has been sent to <?php echo $_GET['maskmail'] ?></p>
    			        </div>
    			        
    			   <?php }
    			?>
    			
    			
    			<div class="passInput">
    			    <input type="text" name="username" value="<?php echo $_GET['uname'];?>" hidden>    
    				<input type="number" name="otp" placeholder="OTP" id="otp" required="OTP">
    			</div>
    			<div class="passInput">
    				<input type="password" name="password" placeholder="New password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
    			</div>
    			<div class="passInput">
    				<input type="password" name="cpassword" placeholder="Confrim New password" required>
    			</div>
    			<div class="submitButton">
    				<button type="submit" name="submit">Reset</button>
    			</div>
    		</form>
    	</section>
    </body>
    </html>
    
    
    <?php 

        if(isset($_POST['submit'])){
            include "db.php";
            
            $otp = $_POST['otp'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $username = $_POST['username'];
            if($password == $cpassword){
                $student_sql = "SELECT * FROM `students` WHERE `username`='".$username."' ";
                //$faculty_sql = "SELECT * FROM `faculty` WHERE `facutly_id`= '".$username."' ";
                $faculty_sql ="SELECT * FROM faculty WHERE faculty_id='".$username."'";
                $result_student = mysqli_query($conn,$student_sql);
                $result_faculty = mysqli_query($conn,$faculty_sql);    
                
                if(mysqli_num_rows($result_student) == 1){
                    $row = mysqli_fetch_assoc($result_student);
                    
                    if($row['vkey'] == $otp){
                        $update_pass = "UPDATE students SET passwords='".$cpassword."' WHERE username='".$username."' ";
                        
                        if(mysqli_query($conn,$update_pass)){
                            
                            header("Location: index.php?success=Password reset successfull");
                            
                        }else{
                            header("Location: reset_password.php?error=Password reset faild");
                        }
                        
                    }else{
                        header("Location: reset_password.php?error=Invalid OTP&uname=$username");
                        exit();
                    }
                    
                }elseif(mysqli_num_rows($result_faculty) ==1){
                    $row = mysqli_fetch_assoc($result_faculty);
                    
                    if($row['vkey'] == $otp){
                        $update_pass = "UPDATE faculty SET password='".$cpassword."' WHERE faculty_id='".$username."' ";
                        
                        if(mysqli_query($conn,$update_pass)){
                            
                            header("Location: index.php?success=Password reset successfull");
                            
                        }else{
                            header("Location: reset_password.php?error=Password reset faild");
                        }
                        
                    }else{
                        header("Location: reset_password.php?error=Invalid OTP&uname=$username");
                        exit();
                    }
                    
                }else{
                    header("Location: reset_password.php?error=Invalid Entry");
                    exit();
                }
                
            }else{
                header("Location: reset_password.php?error=Password and Conform Password must be same&uname=$username");
                exit();
            }
        }
    
    ?>


<?php }

else{
    header("Location: forgotpassword.php");
    exit();

}

?>