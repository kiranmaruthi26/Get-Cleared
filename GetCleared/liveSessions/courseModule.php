<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname'])){
	include "../db.php";

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>Course Module</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
		<link rel="icon" href="../images/icon.png">
	</head>
	<body>
		<header class=" bg-light d-flex">

			<nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
				<div class="container-fluid">

					<div class="navbar">
						<div style="display: block;">
							<a class="navbar-brand" href="#">GetCleared</a>
							<div>
								<h6 class="text-center">Hello, <?php echo $_SESSION['fname']; ?></h6>
							</div>
						</div>
					</div>
					<div class="m-4">
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link"  href="../home-faculty.php">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="#">Courses Module</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../solve-problem.php">New Problem</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../solved-problems.php">Solved Problems</a>
								</li>
								<li class="nav-item">
                                    <a class="nav-link" href="./knowledgecenter/add_topic">Knowledge Center</a>
                                </li>
								<li class="nav-item">
									<a class="nav-link" href="../IDE/online_ide.php">Start Coding</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../changePassword-faculty.php">Change Password</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../logout.php">Logout</a>
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



		<main class="w-100 container-fluid mt-4">

			<?php 
				$sql = "SELECT * FROM coursemodule WHERE faculty_id='".$_SESSION['faculty_id']."'";
				$result = mysqli_query($conn,$sql);?>

				<div class="text-center text-uppercase">
				<h4><?php echo $_SESSION['course']; ?> Course Module</h4>
				</div>
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
			<div class="row row-cols-1 row-cols-md-2 row-cols-sm-1 row-cols-lg-4 w-100" style="margin-right: 0;">
				<?php if(mysqli_num_rows($result)>0){

					while($row = mysqli_fetch_array($result)){		

			?>

				<div class="col m-1 mt-2 w-auto">
					<div class="card m-1 mt-3 border-secondary p-3 shadow-lg" style="width:18rem;">
						<img src=<?php echo "./modulelogos/".$row['logo_img'];?> alt=LogoImage class="card-image-top rounded" style="height:220px;">
						<div class="card-body">
							<h5 class="card-title text-center text-primary fw-bold fs-5 text-uppercase"><?php echo $row['title'];?></h5>
							<p class="card-text text-center text-warning"><?php echo $row['description']?></p>
							<div class="text-center">
								<form method="get" action="viewmodule.php">
									<input type="text" name="tabId" value=<?php echo $row['id']?> hidden>
									<button class="btn btn-primary text-center" type="submit">Open Event</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php 
					}
				}

				?>
				<div class="col m-1 mt-2 w-auto">
					<div class="card m-1 mt-3 border-secondary p-3 shadow-lg" style="width:18rem;">
						<img src="./images_live/AddMore.png" alt="" class="card-image-top rounded-circle">
						<div class="card-body">
							<div class="text-center">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodule" data-whatever="@mdo">Add Module</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--Add More popup -->
		<section class="popup">
			<div class="modal fade" id="addmodule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop = "static" data-keyboard="false">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add a Module</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="addmodule.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">Module Title</label>
									<input type="text" class="form-control" id="recipient-mTitle" name="mTitle" required>
								</div>
								<div class="form-group">
									<label for="message-text" class="col-form-label">Description</label>
									<input type="text" class="form-control" id="recipient-description" name="description" required>
								</div>
								<div class="form-group">
									<label for="message-text" class="col-form-label">Upload Header Image</label>
									<p class="col-from-label p-0 m-0 text-danger " style="font-size:10px">Max Size :  Must be lessthan 2MB</p>
									<p class="col-from-label p-0 m-0 text-danger " style="font-size:10px">Image Type : jpg, jpeg, png</p>
									<input type="file" class="form-control" id="recipient-mlogo" name="file" required>
								</div>
								<div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary text-lowercase" name="submit">Creat module</button>
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


		<script type="text/javascript" src="./JS/bootstrap.min.js"></script>


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
	</html>


	<?php
}else{
	header("Location: ../index.php");
}

?>