<?php 

	include "../db.php";

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	$username = $_POST['user'];
	$feedback = mysqli_real_escape_string($conn,validate($_POST['feedback']));
	$rating = $_POST['rating'];


	$storeFeedback = "INSERT INTO feedback(username,rating,feedback,`datetime`) VALUES('$username','$rating','$feedback',NOW())";
	if(mysqli_query($conn,$storeFeedback)){
		echo 1;
	}else{
		echo 0;
	}
	
?>
