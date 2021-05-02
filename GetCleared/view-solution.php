<?php 
session_start();
include "db.php";
if(isset($_GET['Qid'])){ 
	 $sql_doubt = "SELECT * FROM student_doubt WHERE id='".$_GET['Qid']."'";

	 $result_doubt = mysqli_query($conn, $sql_doubt);
	 

	 if(mysqli_num_rows($result_doubt) == 1){
	 	$row = mysqli_fetch_assoc($result_doubt);
	 	$doubt_text =  $row['doubt'];
	 	$doubt_subject =  $row['course'];
	 }

	 $sql_solution = "SELECT * FROM faculty_solution WHERE problem_id='".$_GET['Qid']."' ";
	 $result_solution = mysqli_query($conn,$sql_solution);
	 if(mysqli_num_rows($result_solution) == 1){
	 	$row_sol = mysqli_fetch_assoc($result_solution);

	 	$faculty_id = $row_sol['faculty_id'];
	 	$solution_img = $row_sol['image'];
	 	$solution_text = $row_sol['solution'];
	 	$facultyInfo = "SELECT * FROM faculty WHERE faculty_id='".$faculty_id."' ";
	 	$result_facultyInfo = mysqli_query($conn,$facultyInfo);

	 	if(mysqli_num_rows($result_facultyInfo) == 1){
	 		$row_facInfo = mysqli_fetch_assoc($result_facultyInfo);
	 		
	 		$faculty_name = $row_facInfo['name'];
	 		$phonenumber = "tel:".$row_facInfo['phonenumber'];
	 		$email = "mailto:".$row_facInfo['email'];
	 	}
	 	
	 }
	


?>




<!DOCTYPE html>
<html>
<head>
    <title>View Solution - GetCleared</title>
    <link rel="stylesheet" type="text/css" href="./css/style_viewsolution.css">
</head>
	<body>
	    <section>
	         <header class="head-container">
            <div class="titleSection">
                <h1 class="headTitle">GetCleared</h1>
                <h3>Hello, <?php echo $_SESSION['name'];?></h3>
            </div>
            <nav>
                <ul>
                    <li class="menu"><a href="./home-student.php">Home</a></li>
                    <li class="menu"><a href="./Ask-doubt.php">Ask a Doubt</a></li>
                    <li class="menu"><a href="./checksolutions.php">Solutions</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
        </header>
	    </section>

	    <section class="solution-container">
	    	<div class="mainHeadSection">
	    		<h2>Hey <?php echo $_SESSION['name'];?> here is your solution</h2>
	    	</div>
	    </section>
	    <section class="solution-container">
	    	<div class="solution-left-div">
	    		<h3>You've Asked </h3>
	    	</div>
	    	<div class="solution-right-div">
	    		<h3><?php echo $doubt_text; ?></h3>
	    	</div>
	    </section>
	     
	    <section class="solution-container">
	    	<div class="solution-left-div">
	    		<h3>Solved by </h3>
	    	</div>
	    	<div class="solution-right-div">
	    		<h3><?php echo $faculty_name;?></h3>
	    	</div>
	    </section>
	    <section class="solution-container">
	    	<div class="solution-left-div">
	    		<h3>Uploaded Image</h3>
	    	</div>
	    		<div class="solution-right-div">
		    		<?php 
		    			echo "<a href=./faculty_uploads/".$solution_img." target=_blank><img src=./faculty_uploads/".$solution_img." class=solutionImg></a>";
		    		?>
	    		</div>
	    </section>
	    <section class="solution-container">
	    	<div class="solution-left-div">
	    		<h3>Read this context</h3>
	    	</div>
	    	<div class="solution-right-div">
	    		<p><?php echo $solution_text;?></p>
	    	</div>
	    </section>
	    <section class="StructedClass">
	    	<div>
	    		<h3>Still got Structed..?</h3>
	    		<h4>Try contacting your faculty <a href="<?php echo $phonenumber;?>">Make a Call</a> or <a href="<?php echo $email;?>">Send E-Mail</a></h4>
	    	</div>
	    </section>
	    <footer style="background: black;">
        <section>
            <p style="color: white;text-align: center;">Copyrights &#169; kiranmaruhti2k21</p>
        </section>
    </footer>

	</body>
</html>




<?php }else{
	header("Location: checksoltuions.php?");
	exit();
}



?>