<?php 

$host = "localhost";
$user = "u628814859_getcleared";
$password = "@26maruthiK";
$db ="u628814859_getcleared";
$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn){
	echo "Conntection failed".mysqli_error();
}

?>