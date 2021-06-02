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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="icon" href="/images/icon.png">
    
</head>
	<body>
	    <header class="bg-light d-flex">

            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <div class="container-fluid">

                    <div class="navbar">
                        <div style="display: block;">
                            <a class="navbar-brand" href="#">GetCleared</a>
                            <div>
                                <h6 class="text-center">Hello, <?php echo $_SESSION['name']; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="m-4">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link"  href="./home-student.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">Courses Module</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./Ask-doubt.php">Ask a doubt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="./checksolutions.php">Solutions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./IDE/online_ide.php">Start Coding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-student.php">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>Menu
                        </button>
                </div>
            </nav>

        </header>


	    <main class="container p-5 rounded">
	    	<div class="container text-center">
	    		<h2 class="text-dark display-6">Hey <?php echo $_SESSION['name'];?> here is your solution</h2>
	    	</div>
	    </section>
	    <section class="form-group">
	    		<h3 class="col-form-label">You've Asked </h3>
	    		<textarea class="form-control" rows=4 disabled><?php echo $doubt_text; ?></textarea>
	    </section>
	     
	    <section class="form-group">
	    		<h3 class="col-form-label">Solved by </h3>
	    		<p class="text-dark fs-5 form-control"><?php echo $faculty_name;?></p>
	    </section>
	    <section class="form-group">
	    	<h3 class="col-form-label">Uploaded File</h3>
		    <?php 
				if($solution_img == 0){?>
					<p class="text-dark fs-5">File Not Uploaded</p>
		    		   <?php }else{?>
		    		        
		    			<a href="<?php echo './faculty_uploads/'.$solution_img;?>" target=_blank><img  src="<?php echo './faculty_uploads/'.$solution_img;?>" class="form-control" alt="Open File"></a>
						<strong class="lead fs-6">*Click on the image to download/ View</strong>
		    		  <?php  }
		    		?>
	    </section>
	    <section class="form-group">
	    	<h3 class="col-form-label">Read this context</h3>
	    	<textarea class="form-control" disabled rows=10 cols=100><?php echo $solution_text;?></textarea>
	    </section>
	    <section class="form-footer text-center mt-5 bg-light p-2 rounded">
	    		<h3 class="display-4 fs-4">Still got Structed..?</h3>
	    		<p class="fs-6">Try contacting your faculty</p>
	    		<p class="fs-6"><a href="<?php echo $phonenumber;?>">Make a Call</a> or <a href="<?php echo $email;?>">Send E-Mail</a></p>
	    </main>
	    
    </main>
<!-- Footer -->
        <footer class="page-footer font-small blue bg-light">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2021 Copyright:
                <a>kunakiranmaruhti</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->



     <script type="text/javascript" src="./JS/bootstrap.min.js"></script>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	</body>
</html>




<?php }else{
	header("Location: checksoltuions.php?");
	exit();
}



?>