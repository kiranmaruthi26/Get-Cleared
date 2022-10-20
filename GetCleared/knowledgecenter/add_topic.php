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
		<title>Knowledge Center - GetCleared</title>
	</head>
	<body>

		<?php if(isset($_SESSION['name'])){?>
			<!-- Student nav-->

				<header class="bg-light d-flex">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
					<script type="text/javascript" src="../JS/upload_profile.js"></script>
					<script type="text/javascript" src="../JS/getProfilePics.js"></script>


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
                    				<a class="nav-link active"  href="../profile/">Profile</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" data-target="#sub-nav">
                    					<span>Menu</span>
                    				</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../changePassword-student">Change Password</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../logout.php">Logout</a>
                    			</li>
                    		</ul>
                    	</div>

                    	<div class="collapse navbar-collapse" id="sub-nav">
                    		<ul class="navbar-nav">
                    			<li class="nav-item">
                    				<a class="nav-link"  href="../home-student.php">Home</a>
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
                    				<a class="nav-link" href="../knowledgecenter/add_topic">Knowledge Center</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../materials/viewmaterials">Materials</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="./IDE/online_ide">Start Coding</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../changePassword-student">Change Password</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../logout.php">Logout</a>
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
                    					<img src="../profile/photos/profile-dummy.png" width="40" height="40" class="rounded-circle" id="profile_photo">
                    				</a>
                    				<div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink" id="main-menu">
                    					<a class="dropdown-item" href="../profile/">Profile</a>
                    					<a class="dropdown-item dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#menu">
                    						
                    						<span>Menu</span>
                    					</a>
                    					<a class="dropdown-item" href="../changePassword-student">Change Password</a>
                    					<a class="dropdown-item" href="../logout.php">Log Out</a>
                    				</div>

                    				<div class="dropdown-menu bg-light" aria-labelledby="menu-list" id="menu">
                    					<a class="dropdown-item " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#main-menu">
                    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    							<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    						</svg>
                    					</a>
                    					<a class="dropdown-item"  href="../home-student.php">Home</a>
                    					<a class="dropdown-item" aria-current="page" href="#">Courses Module</a>
                    					<a class="dropdown-item" href="../Ask-doubt">Ask a doubt</a>
                    					<a class="dropdown-item" href="../checksolutions">Solutions</a>
                    					<a class="dropdown-item" href="../materials/viewmaterials">Materials</a>
                    					<a class="dropdown-item" href="../knowledgecenter/add_topic">Knowledge Center</a>
                    					<a class="dropdown-item" href="../IDE/online_ide">Start Coding</a>
                    				</div>
                    			</li>   
                    		</ul>
                    	</div>
                    </div>
                </nav>

            </header>


        <?php }elseif(isset($_SESSION['fname'])){?>
        	<!-- faculty navbar-->
        	<header class="bg-light d-flex">
        		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        		<script type="text/javascript" src="../JS/upload_profile.js"></script>
        		<script type="text/javascript" src="../JS/getProfilePics.js"></script>


        		<nav class="navbar navbar-expand-lg navbar-light bg-light w-100 container">
        			<div class="container-fluid">
        				<div class="navbar">
        					<div style="display: block;">
        						<a class="navbar-brand" href="#">GetCleared</a>
        						<div>
        							<h6 class="text-center">Hello, <?php echo $_SESSION['fname']; ?></h6>
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
                    				<a class="nav-link active"  href="../profile/">Profile</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" data-target="#sub-nav">
                    					<span>Menu</span>
                    				</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../changePassword-faculty">Change Password</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../logout.php">Logout</a>
                    			</li>
                    		</ul>
                    	</div>

                    	<div class="collapse navbar-collapse" id="sub-nav">
                    		<ul class="navbar-nav">
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
                    				<a class="nav-link" href="./solved-problems">Solved Problems</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../knowledgecenter/add_topic">Knowledge Center</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../materials/viewmaterials">Materials</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="./IDE/online_ide">Start Coding</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../changePassword-faculty">Change Password</a>
                    			</li>
                    			<li class="nav-item">
                    				<a class="nav-link" href="../logout.php">Logout</a>
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
                    			<img src="../profile/photos/profile-dummy.png" width="40" height="40" class="rounded-circle" id="profile_icon">
                    		</span>
                    	</button>
                    	<div class="collapse navbar-collapse">
                    		<ul class="navbar-nav">
                    			<li class="nav-item dropdown">
                    				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbar-list-4">
                    					<img src="../profile/photos/profile-dummy.png" width="40" height="40" class="rounded-circle" id="profile_photo">
                    				</a>
                    				<div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink" id="main-menu">
                    					<a class="dropdown-item" href="../profile/">Profile</a>
                    					<a class="dropdown-item dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#menu">
                    						
                    						<span>Menu</span>
                    					</a>
                    					<a class="dropdown-item" href="../changePassword-faculty">Change Password</a>
                    					<a class="dropdown-item" href="../logout.php">Log Out</a>
                    				</div>

                    				<div class="dropdown-menu bg-light" aria-labelledby="menu-list" id="menu">
                    					<a class="dropdown-item " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#main-menu">
                    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    							<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    						</svg>
                    					</a>
                    					<a class="dropdown-item" href="../home-faculty">Home</a>
                    					<a class="dropdown-item" aria-current="page" href="./liveSessions/courseModule">Courses Module</a>
                    					<a class="dropdown-item" href="../solve-problem">New Problem</a>
                    					<a class="dropdown-item" href="../solved-problems">Solved Problems</a>
                    					<a class="dropdown-item" href="../materials/viewmaterials">Materials</a>
                    					<a class="dropdown-item" href="../knowledgecenter/add_topic">Knowledge Center</a>
                    					<a class="dropdown-item" href="../IDE/online_ide">Start Coding</a>
                    				</div>
                    			</li>   
                    		</ul>
                    	</div>
                    </div>
                </nav>

            </header>

        <?php }?>


        <?php 
        include "../db.php";
        $knowledgecenter = "SELECT * FROM knowledgecenter";
        $result = mysqli_query($conn,$knowledgecenter);

        ?>
        <main class="container-fluid bg-light">
        	<h1 class="fw-lighter text-center">Knowledge center</h1>
        	<?php if(isset($_GET['error'])){?>
        		<div class="alert alert-danger text-center alert-dismissible fade show container" role="alert">
        			<strong><?php echo $_GET['error']?></strong>
        			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        		</div>
        	<?php }?>
        	<?php if(isset($_GET['success'])){?>
        		<div class="alert alert-success text-center alert-dismissible fade show container" role="alert">
        			<strong><?php echo $_GET['success']?></strong>
        			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        		</div>
        	<?php }?>
        	<div class="container bg-white">
        		<div class="text-end p-4">
        			<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addtopic" data-whatever="@mdo">+ Add Topic</button>
        		</div>
        		<div style="overflow-x:auto">
        			<p class="fw-lighter fs-3">Topics posted</p>
        			<table class="table table-hover table-striped">
        				<tbody>
        					<thead>
        						<tr>
        							<th scope="col">#</th>
        							<th scope="col">Topic</th>
        							<th scope="col">Related to</th>
        							<th scope="col">Posted by</th>
        							<th scope="col">Posted On</th>
        							<th scope="col">Discussion</th>

        						</tr>
        					</thead>
        					<?php 
        					if(mysqli_num_rows($result)>0){
        						$count = 0;
        						while($row = mysqli_fetch_array($result)){
        							$count = $count+1;
        							?>
        							<tr>
        								<th scope="row"><?php echo $count?></th>
        								<td><?php echo $row['topic']?></td>
        								<td><?php echo $row['subject']?></td>
        								<td><?php echo $row['name']?></td>
        								<td><?php echo $row['posted_date']?></td>
        								<td>
        									<form method="get" action="discussion.php">
        										<input type="text" name="topic_id" value="<?php echo $row['id'] ?>" hidden>
        										<button class="btn btn-sm btn-info">Go to Dicussion</button>
        									</form>
        								</td>
        							</tr>
        						<?php	}

        					}else{
        						echo "<p class='text-center fs-4 text-lighter'>No topics</p>";
        					}

        					?>
        				</tbody>
        			</table>
        		</div>
        	</div>
        </main>
        <!--Add More popup -->
        <section class="popup">
        	<div class="modal fade" id="addtopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop = "static" data-keyboard="false">
        		<div class="modal-dialog" role="document">
        			<div class="modal-content">
        				<div class="modal-header">
        					<h5 class="modal-title" id="exampleModalLabel">Add Topic</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        						<span aria-hidden="true">&times;</span>
        					</button>
        				</div>
        				<div class="modal-body">
        					<form action="add_topic_db.php" method="post" enctype="multipart/form-data">
        						<div class="form-group">
        							<label for="recipient-name" class="col-form-label">Topic title</label>
        							<input type="text" class="form-control" id="recipient-mTitle" name="TopicTitle" required>
        						</div>
        						<div class="form-group">
        							<label for="message-text" class="col-form-label">Topic related to ?</label>
        							<input type="text" class="form-control" id="recipient-description" name="subject" required placeholder="Example: Python, AI, ML, etc..">
        						</div>
        						<div class="form-group">
        							<label for="message-text" class="col-form-label">Say something About topic (Optional)</label>
        							<input type="text" class="form-control" id="recipient-description" name="description">
        						</div>
        						
        						<div class="modal-footer">
        							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        							<button type="submit" class="btn btn-primary" name="submit">Add topic</button>
        						</div>
        					</form>
        				</div>
        			</div>
        		</div>
        	</section>



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


        	
        	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
        </html>

        <?php 
    }else{

    	header("Location: ../index.php");
    	exit();
    }
?>