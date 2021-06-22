<?php 
include "db.php";
session_start();
	
	if(isset($_SESSION['username']) && isset($_POST['course']) && isset($_POST['doubt-text'])){
	    
	    function sendEmail($toMail,$name,$doubt,$sroll){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "support@getcleared.in";
            $to = $toMail;
            $subject = "GetCleared - New Question Notification";
            $message = "<h2>!! New Question !!</h2>
            <h2>Dear $name</h2>
            <h3>You got a new question from $sroll</h3>
            <h4>The doubt is $doubt</h4>
            <h5>For any support revert back to this mail</h5>
            <p>With Regards</p>
            <p>Kiran Maruthi Kuna</p>
            <p>Developer - getcleared.in</p>";
            $headers = "From:" . $from."\r\n";
            $headers .= "MIME-Version: 1.0"."\r\n";
            $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
            if(!mail($to,$subject,$message, $headers)) {
        		header("Location: Ask-doubt?error=email Sending faild");
			    exit();	
            }
        }

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$rollnumber =$_SESSION['username'];
		$course = $_POST['course'];
		$doubt = mysqli_real_escape_string($conn,validate($_POST['doubt-text']));
		
		if($_SESSION['section'] == "A" or $_SESSION['section'] == "B"){
		    $section = "A&B";
		}elseif($_SESSION['section'] == "C" or $_SESSION['section'] == "D"){
		    $section = "C&D&CST";
		}elseif($_SESSION['section'] == "CST"){
		     $section = "C&D&CST";
		}

		if($course == 'emptyValue'){
			header("Location: Ask-doubt?error=Course selection required");
			exit();
		}/*else if(empty($files)){
			header("Location: Ask-doubt.php?error=File selection required");
			exit();
		}*/else if(empty($doubt)){
			header("Location: Ask-doubt?error=Doubt field is required");
			exit();
		}else{

			// File upload path
			//print_r($_FILES["file"]);
			$fullFileName =$_FILES["file"]["name"];
			$tmepName = $_FILES["file"]["tmp_name"];
			$fileType = $_FILES["file"]["type"];
			$uploads_dir = 'student_uploads';
			$deforeFileName = substr($fullFileName, 0, strpos($fullFileName, '.'));
           /* $newFileName = uniqid("",true).'-'.$rollnumber.''.ltrim($fullFileName,$deforeFileName);*/
            if(empty($_FILES["file"]["name"])){
                $newFileName = 0;
            }else{
                $newFileName = uniqid("",true).'-'.$rollnumber.''.ltrim($fullFileName,$deforeFileName);
            }
			move_uploaded_file($tmepName, $uploads_dir.'/'.$newFileName);
			date_default_timezone_set("Asia/Kolkata");
			$time = date("h:i:s");
			$date = date("Y-m-d");
			$dateTime = $date." ".$time;

			$insert = "INSERT INTO `student_doubt` (`rollnumber`, `course`, `images`, `doubt`,`section`,`datetime`) VALUES ('$rollnumber', '$course', '$newFileName', '$doubt', '$section' ,NOW())";
			if(mysqli_query($conn,$insert)){
			    $sql_fac ="SELECT * FROM faculty WHERE section='".$section."' AND course='".$course."'";
			    if($result_fac = mysqli_query($conn,$sql_fac)){
    			    if(mysqli_num_rows($result_fac)){
    			        $row = mysqli_fetch_assoc($result_fac);
    			        $toMail = $row['email'];
    			        $fname = $row['name'];
    			        sendEmail($toMail,$fname,$doubt,$rollnumber);
    			        header("Location: home-student?success=Thankyou, Your doubt was submitted successfully with GetCleared");
    			    }
			    }else{
			        header("Location: Ask-doubt?error=ERROR in connceting Faculty Data base!");
			    }
			}else{
				echo "Error in connectig to form";
			}
		}



	}else{

		header("Location: Ask-doubt?error=returning back");
		exit();	
	}


 ?>