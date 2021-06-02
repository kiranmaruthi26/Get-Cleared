<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname'])){
	include "../db.php";

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$tabId = $_POST['tabId'];
	$sTitle =  $_POST['sTitle'];
	$description = $_POST['description'];
	$url = mysqli_real_escape_string($conn,validate($_POST['url']));
	$startdate = mysqli_real_escape_string($conn,validate($_POST['startdate']));
	$enddate = mysqli_real_escape_string($conn,validate($_POST['enddate']));
	$starttime = mysqli_real_escape_string($conn,validate($_POST['starttime']));
	$endtime = mysqli_real_escape_string($conn,validate($_POST['endtime']));
	$tablename = $_POST['tablename'];

	
	$sTitle = validate($sTitle);
	$description = validate($description);
	$url = validate($url);

	$insert_session = "INSERT INTO `$tablename` (`title`,`description`,`sessionLink`,`startdate`,`enddate`,`startTime`,`endTime`,`scheduledOn`) VALUES ('$sTitle','$description','$url','$startdate','$enddate','$starttime','$endtime',NOW())";
	if(mysqli_query($conn,$insert_session)){
		header("Location: viewmodule.php?tabId=$tabId&success=Session scheduled successfully");
	}else{
		header("Location: viewmodule.php?tabId=$tabId&error=Failed to Creat a Session, Please try again");
		//echo "Location: viewmodule.php?tabId=".$tablename." & error=Failed to Creat a Session, Please try again";
	}
}else{
	header("Location:../index.php");
	exit();
}
?>