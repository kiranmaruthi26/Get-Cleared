<?php 
session_start();

if(isset($_SESSION['id'])){
	include "../db.php";

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$title = mysqli_real_escape_string($conn,validate($_POST['TopicTitle']));
	$subject = validate($_POST['subject']);
	$description = mysqli_real_escape_string($conn,validate($_POST['description']));


	if(empty($description)){
		$description = "";
	}
	if(isset($_SESSION['username'])){
		$person_id = $_SESSION['username'];
		$name = validate($_SESSION['name']);
	}elseif(isset($_SESSION['faculty_id'])){
		$person_id = $_SESSION['faculty_id'];
		$name = validate($_SESSION['fname']);
	}

	$tablename = "knowledgetab_".rand(100000,999999);
	
	$creatTable = "CREATE TABLE `db`.`".$tablename."` ( 
			`id` INT NOT NULL AUTO_INCREMENT , 
			`person_id` VARCHAR(300) NOT NULL , 
			`person_name` VARCHAR(50) NOT NULL, 
			`discussion` LONGTEXT NOT NULL ,
			`posted_on` DATETIME NOT NULL , 
			PRIMARY KEY (`id`)) ENGINE = MyISAM;";
	//echo $_SESSION['id'];
	/*echo $person_id;
	echo $title;
	echo $description;
	echo $tablename;*/

	if(mysqli_query($conn,$creatTable)){

		$insert_topic = "INSERT INTO `knowledgecenter`(`person_id`,`name`,`topic`,`subject`,`description`,`topic_table`,`posted_date`) VALUES('$person_id','$name','$title','$subject','$description','$tablename',NOW())";
		print_r($insert_topic);

		if(mysqli_query($conn,$insert_topic)){
			header("Location: ./add_topic?success=Topic added Successfully");
			exit();
		}else{
			header("Location: ./add_topic?Error=Faild to upload topic, Please try again");
			exit();
			//echo $name;
		}

	}else{
		echo "Faild to creat";
	}


}else{
	header("Location:../index.php");
	exit();
}


?>
