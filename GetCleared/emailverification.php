
<?php 
    if(isset($_GET['email'])){
?>  
    
<!DOCTYPE html>
<html>
<head>
	<title>Account verification - GetCleared</title>
	<link rel="stylesheet" type="text/css" href="./css/style_emailverification.css">
</head>
<body>
	<section class="formcontainer">
		<form method="post" action="">
			<div>
				<h1>Account Verification - GetCleared</h1>
			</div>
			<div class="noteDiv">
			    <h4>OTP has been sent to your registered Email</h4>
			</div>
			<div>
				<input type="email" name="email" placeholder="Email" value="<?php echo $_GET['email'];?>" hidden>
			</div>
			<div>
				<input type="number" name="otp" placeholder="Enter OTP">
			</div>
			<div class="buttonDiv">
				<input type="submit" name="submit">
			</div>
		</form>
	</section>

</body>
</html>

<?php
 }else{
        echo "Invalid Entry";
}    
?>

<?php 
    if(isset($_POST['submit'])){
        include "db.php";
        $vkey = $_POST['otp'];
        $email = $_POST['email'];
            $sql_student = "SELECT vkey,verification,email FROM students WHERE vkey='".$_POST['otp']."' AND verification='unverified'";
            $sql_faculty = "SELECT vkey,verification,email FROM faculty WHERE vkey='".$_POST['otp']."' AND verification='unverified'";
            $result_stuednt = mysqli_query($conn, $sql_student);
            $result_faculty = mysqli_query($conn, $sql_faculty);
            
            //Student verification
            if(mysqli_num_rows($result_stuednt) == 1){
                $row = mysqli_fetch_assoc($result_stuednt);
                if($row['vkey'] == $vkey)
                {
                    if($row['email'] == $email){
                    
                        $verification_update = "UPDATE `students` SET verification='verified' WHERE vkey='".$vkey."'";
                        if(mysqli_query($conn,$verification_update))
                        {
                            header("Location: index.php?success=Your Account is successfully verified, Please Login");
        			        exit();
                        }
                        else{
                            header("Location: index.php?error=Account verification faild, Try again later");
        			        exit();
                        }
                    }else{
                        header("Location: index.php?error=Invalid Email");
        			    exit();
                    }
                }else{
    			     header("Location: index.php?error=Verification Key not found");
    			    exit();
                }
                
            }elseif(mysqli_num_rows($result_faculty) == 1){
                //faculty verify
               $row = mysqli_fetch_assoc($result_faculty);
               
               if($row['vkey'] == $vkey){
                   if($row['email'] == $email){
                        $verification_update = "UPDATE `faculty` SET verification='verified' WHERE vkey='".$vkey."'";
                        if(mysqli_query($conn,$verification_update))
                        {
                            header("Location: index.php?success=Your Account is successfully verified, Please Login");
        			        exit();
                        }
                        else{
                            header("Location: index.php?error=Account verification faild, Try again later");
        			        exit();
                        }
                   }else{
                       header("Location: index.php?error=Invalid Email");
        			    exit();
                   }
                }else{
    			    header("Location: index.php?error=Verification Key not found");
    			    exit();
                }
            }else{
                echo "<script>alert('Invalid OTP');</script>";
            }
    }

?>