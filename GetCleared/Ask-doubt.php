<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['username'])){

?>


<!DOCTYPE html>
<html>
<head>
	<title>Ask a Doubt - GetCleared</title>

     <link rel="icon" href="/images/icon.png">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="icon" href="./images/icon.png">
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
                                    <a class="nav-link active" href="#">Ask a doubt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./checksolutions.php">Solutions</a>
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

    <section class="container text-center">
            <h2 class="text-dark display-6">Got Strucked...?</h2>
            <h3 class="lead">Get cleared - Get all your doubts cleared on this platform</h3>
    </section>

    <section class="container bg-light p-3 rounded">
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
    	<section class="container">
           
    		<form method="post" action="submit-doubt.php" enctype="multipart/form-data" class="form needs-validation" novalidate>
                
    			<div class="form-group">
    				<h4 class="col-form-label">Roll Number</h4>
    				<input type="text" name="rollnumber" value='<?php echo $_SESSION['username'];?>' disabled class="form-control">
    			</div>
    			<div class="form-group">
    			    <input type="text" name="section" value='<?php echo $_SESSION['section'];?>' class="form-control" hidden>
    			</div>
    			<div class="form-group">
    				<h4 class="col-form-label">Select Course</h4>
	    			<select class="form-select" name="course" required>
	    			<option value="emptyValue">Select Course</option>
	  				<option value="java">Java</option>
	  				<option value="Python">Python</option>
	  				<option value="CO">Computer Organisation</option>
	  				<option value="flat">FLAT</option>
					</select>
                    <div class="invalid-feedback">
                      Select course
                    </div>
				</div>
				<div class="form-group">
					<h4 class="col-form-label">Upload the Screenshot/ Photo</h4>
                    <p class="col-form-label text-danger m-0 p-0    ">*To upload multiple images try converting to pdf and upload</p>
                    <p class="col-form-label text-danger m-0 p-0">*File must be lessthan 2MB</p>
					<input type="File" name="file" class="form-control">
				</div>
				<div class="form-group">
					<h4 class="col-form-label">Tell something about your doubt</h4>
					<textarea rows =10 cols=50 name="doubt-text" placeholder="Sir, Can you explain me the above mentioned doubt" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info w-100 mt-4">
				</div>
				<div class="form-footer text-center">
                    <h4 class="col-form-label">🤔🤔 I Changed my Mind 🤔🤔</h4>
				    <a href="./home-student.php" class="btn-secondary btn btn-sm">Go back to home page</a>
				</div>
    		</form>
    	</section>

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

    header("Location: index.php");
    exit();
}
?>