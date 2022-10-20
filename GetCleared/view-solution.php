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
	    <!-- Student nav-->

        <header class="bg-light d-flex">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript" src="./JS/upload_profile.js"></script>
            <script type="text/javascript" src="./JS/getProfilePics.js"></script>


            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 container">
                <div class="container-fluid">
                    <div class="navbar">
                        <div style="display: block;">
                            <a class="navbar-brand" href="#">GetCleared</a>
                            <div>
                                <h6 class="text-center">Hello, <?php echo $_SESSION['name']; ?></h6>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        var count = 0;
                        function showNav(){
                            if (count === 0){
                                document.getElementById("navbar-list").style.display = "block";
                                count++;
                                console.log("if :"+count);
                            }
                            else{
                                document.getElementById("navbar-list").style.display = "none";
                                count = 0;
                                console.log(count);
                            }
                            //console.log(count);
                        }
                    </script>


                    <div class="m-2" id="navbar-list" style="display:none;">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active"  href="./profile/">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" data-target="#sub-nav">
                                        <span>Menu</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-student">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>

                        <div class="collapse navbar-collapse" id="sub-nav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link"  href="./home-student.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">Courses Module</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./Ask-doubt">Ask a doubt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./checksolutions">Solutions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./knowledgecenter/add_topic">Knowledge Center</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./materials/viewmaterials">Materials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./IDE/online_ide">Start Coding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-student">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>Menu
                        </button>
                    </div>-->


                    <div class="float-end" style="margin-right:10%;">
                        <button class="navbar-toggler rounded-circle" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="showNav()">
                            <span >
                                <img src="./profile/photos/profile-dummy.png" width="40" height="40" class="rounded-circle" id="profile_icon">
                            </span>
                        </button>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbar-list-4">
                                        <img src="./profile/photos/profile-dummy.png" width="40" height="40" class="rounded-circle" id="profile_photo">
                                    </a>
                                    <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink" id="main-menu">
                                        <a class="dropdown-item" href="./profile/">Profile</a>
                                        <a class="dropdown-item dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#menu">

                                            <span>Menu</span>
                                        </a>
                                        <a class="dropdown-item" href="./changePassword-student">Change Password</a>
                                        <a class="dropdown-item" href="./logout.php">Log Out</a>
                                    </div>

                                    <div class="dropdown-menu bg-light" aria-labelledby="menu-list" id="menu">
                                        <a class="dropdown-item " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#main-menu">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                        </a>
                                        <a class="dropdown-item"  href="./home-student.php">Home</a>
                                        <a class="dropdown-item" aria-current="page" href="#">Courses Module</a>
                                        <a class="dropdown-item" href="./Ask-doubt">Ask a doubt</a>
                                        <a class="dropdown-item" href="./checksolutions">Solutions</a>
                                        <a class="dropdown-item" href="./materials/viewmaterials">Materials</a>
                                        <a class="dropdown-item" href="./knowledgecenter/add_topic">Knowledge Center</a>
                                        <a class="dropdown-item" href="./IDE/online_ide">Start Coding</a>
                                    </div>
                                </li>   
                            </ul>
                        </div>
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
                <a href="http://kiranmaruthi.getcleared.in/" target=_blank>kiranmaruthi2k21</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->



     <script type="text/javascript" src="./JS/bootstrap.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	</body>
</html>




<?php }else{
	header("Location: checksoltuions?");
	exit();
}



?>