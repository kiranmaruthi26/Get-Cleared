<?php 
session_start();

include "../db.php";
$tablename = $_GET['dicussion_tabName'];
$discussion_result = "SELECT * from `$tablename`";
if($result = mysqli_query($conn,$discussion_result)){
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			echo "<div>
			<p class='m-0 fw-bold fst-italic'>Posted by ".$row['person_name']." on ".$row['posted_on']."</p>
			<textarea class='form-control mb-3' rows='5' disabled>".$row['discussion']."</textarea></div>";
		}
	}else{
		echo "<p class='text-center fw-lighter fs-4'>Nothing to show...</p>";
	}
}else{
	//echo $discussion_result;
	echo 0;
}


?>