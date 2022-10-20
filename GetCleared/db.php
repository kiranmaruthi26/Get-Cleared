<?php 

$host = "localhost";
$user = "root";
$password = "";
$db ="u628814859_getcleared";
$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn){
	echo "Conntection failed".mysqli_error();
}

?>