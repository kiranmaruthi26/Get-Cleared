<?php 
session_start();

if(isset($_SESSION['id']) && (isset($_SESSION['name']) || isset($_SESSION['fname']))  ){
	if(isset($_SESSION['name'])){
		$name = $_SESSION['name'];
	}elseif(isset($_SESSION['fname'])){
		$name = $_SESSION['fname'];
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="icon" href="../images/icon.png">
    <link rel="stylesheet" type="text/css" href="./css/success.css">
    <title>Home - GetCleared</title>
</head>
<body>
    <header class="bg-light d-flex">

            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <div class="container-fluid">

                    <div class="navbar">
                        <div style="display: block;">
                            <a class="navbar-brand" href="#">GetCleared</a>
                            <div>
                                <h6 class="text-center">Hello, <?php echo $name; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="m-4">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                               <?php if(isset($_SESSION['name'])){?>
                                    <li class="nav-item">
                                    <a class="nav-link active"  href="../home-student.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="#">Courses Module</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Ask-doubt">Ask a doubt</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../checksolutions">Solutions</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link active" href="./knowledgecenter/add_topic">Knowledge Center</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../IDE/online_ide">Start Coding</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../changePassword-student">Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../logout">Logout</a>
                                    </li>


                                <?php }elseif(isset($_SESSION['fname'])){?>

                                    <li class="nav-item">
                                    <a class="nav-link active"  href="../home-faculty">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="../liveSessions/courseModule">Courses Module</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../solve-problem">New Problem</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../solved-problems">Solved Problems</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link active" href="./knowledgecenter/add_topic">Knowledge Center</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../IDE/online_ide">Start Coding</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../changePassword-faculty">Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../logout.php">Logout</a>
                                    </li>
                                <?php }?>
                                
                            </ul>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>Menu
                        </button>
                </div>
            </nav>

        </header>

        <?php 
        	include "../db.php";

        	$knowledgecenter = "SELECT * FROM knowledgecenter WHERE id='".$_GET['topic_id']."'";
        	$result = mysqli_query($conn,$knowledgecenter);
        	if(mysqli_num_rows($result) == 1){
        		$row = mysqli_fetch_assoc($result);
        	}else{
        		header("Location: add_topic?error=No such Id found");
        		exit();
        		//print_r($result);
        	}



        ?>
        
        <main class="container-fluid bg-light" >
            <div class="container-fluid bg-white" >
            <h1 class="fw-lighter text-center rounded">Knowledge center</h1>
            <div class="container bg-white">
                <h1 class="fw-normal fs-3"><?php echo $row['topic']?></h1>
                <p class="fw-lighter fs-5"><?php echo $row['description']?></p>

                <div>
                    <p class="fs-4">Discussion Panel</p>
                </div>
             </div>
             <!--Loader -->
             <div class="text-center d-none" id="loader_data">
                <img src="./images/loader.gif">
                <p class="fw-light">Retriving Data...</p>
            </div>
             <!--Retriveing data from db-->
        		<div class="container bg-white p-3" style="height:400px; overflow: auto;" id="discussion_panel"></div>
                <div class="container bg-white text-end mt-4">
                    <button class="btn btn-secondary btn-sm" onclick="loadMore()">Load More</button>
                </div>
                <div class="mt-4 container">
                    
                    <p class="fw-normal fst-italic fs-4">Share Knowledge</p>
                    <p id="error1" class="text-danger d-none fw-bold">Can't be empty...!</p>
                    <!--Loader -->
                    <div class="text-center d-none" id="loader_send">
                            <img src="./images/loader.gif">
                            <p class="fw-light">Sending Data...</p>
                        </div>
                        <!-- Success Spin-->
                        <div class="svg-container text-center p-2 d-none" id="success">    
                            <svg class="ft-green-tick" xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 48 48" aria-hidden="true">
                                <circle class="circle" fill="#5bb543" cx="24" cy="24" r="22"/>
                                <path class="tick" fill="none" stroke="#FFF" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M14 27l5.917 4.917L34 17"/>
                            </svg>
                            <p className="fw-normal">Thank You😀<br/>We appreciate your participation</p>
                            <p className="fw-normal">Keep Sharing Knowledge..!!</p>
                        </div>
                    <form method="post" action="#" id="discussion_form">
                        <textarea class="form-control" placeholder="what do you think of it ?" rows="6" name="discussion" id="discussion"required></textarea>
                        <input type="text" name="dicussion_tabName" id="dicussion_tabName" value="<?php echo $row['topic_table']?>" hidden>
                        <input type="text" name="topic_id" id="topic_id" value="<?php echo $_GET['topic_id']?>" hidden>
                        <button class="btn btn-info form-control mt-4" id="dis_sub">POST</button>
                    </form>
                </div>
            </div>

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



     <script type="text/javascript" src="../JS/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script type="text/javascript" src ="./js/discussion.js"></script>
     <script type="text/javascript" src="./js/getdiscussion.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}else{

    header("Location: ../index.php");
    exit();
}
?>