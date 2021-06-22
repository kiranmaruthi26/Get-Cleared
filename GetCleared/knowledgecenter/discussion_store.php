<?php 
 session_start();
 	include '../db.php';
 	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

 	
	if(isset($_SESSION['username'])){
		$person_id = $_SESSION['username'];
		$name = validate($_SESSION['name']);
	}elseif(isset($_SESSION['faculty_id'])){
		$person_id = $_SESSION['faculty_id'];
		$name = validate($_SESSION['fname']);
	}

	$discussion = mysqli_real_escape_string($conn,validate($_POST['discussion']));
	$dicussion_tabName = $_POST['dicussion_tabName'];
	$topic_id = $_POST['topic_id'];


	$insert_discussion = "INSERT INTO `$dicussion_tabName` (`person_id`, `person_name`, `discussion`, `posted_on`) VALUES('$person_id','$name','$discussion',NOW())";

	
	if(mysqli_query($conn,$insert_discussion)){
		echo 1;
	}else{
		echo 0;
		print_r($insert_discussion);
	}


?>