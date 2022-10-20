<?php 
    
    include '../db.php';
    $feedback = "SELECT * FROM `feedback` WHERE username ='".$_GET['user']."' ";
    $result = mysqli_query($conn,$feedback);
    if(mysqli_num_rows($result)>0){
        echo "1";
    }else{
        echo "0";
    }

?>