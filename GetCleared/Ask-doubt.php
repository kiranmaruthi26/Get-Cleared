<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['username'])){

?>


<!DOCTYPE html>
<html>
<head>
	<title>Ask a Doubt - GetCleared</title>
	<link rel="stylesheet" type="text/css" href="./css/style_ask.css">
     <link rel="stylesheet" type="text/css" href="./css/responsivecss.css">
    <script>
        function openNav() {
              document.getElementById("mySidenav").style.width = "250px";
            }
            
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
    </script>
</head>
<body>
	<section>
        <header class="head-container">
             <span style="font-size:50px;cursor:pointer" onclick="openNav()" class="menubutton">&#9776;</span>
            <div class="titleSection">
                <h1 class="headTitle">GetCleared</h1>
                <h3>Hello, <?php echo $_SESSION['name'];?></h3>
            </div>
            <nav>
                <ul class="navlist">
                    <li class="menu"><a href="./home-student.php">Home</a></li>
                    <li class="menu"><a href="#">Ask a Doubt</a></li>
                    <li class="menu"><a href="./checksolutions.php">Solutions</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="./home-student.php">Home</a>
              <a href="#">Ask a Doubt</a>
              <a href="./checksolutions.php">Solutions</a>
              <a href="logout.php">LOGOUT</a></li>
            </div>
        </header>
    </section> 
    </section>
    <section class="title">
            <h2>Got Strucked...?</h2>
            <h3>ComeOn GetCleared your doubts here</h3>
    </section>
    <section class="doubt-container">
    	<section class="formBody">
           
    		<form method="post" action="submit-doubt.php" enctype="multipart/form-data">
                <?php if(isset($_GET['error'])){?>

                    <div class="attemptdivError"><?php echo $_GET['error']?></div>

                <?php }?>
                <?php if(isset($_GET['success'])){?>

                    <div class="attemptdivSuccess"><?php echo $_GET['success']?></div>

                <?php }?>
    			<div>
    				<h4>Roll Number</h4>
    				<input type="text" name="rollnumber" value='<?php echo $_SESSION['username'];?>' disabled class="rollinput">
    			</div>
    			<div>
    				<h4>Select Course</h4>
	    			<select class="select-sub" name="course">
	    			<option value="emptyValue">Select Course</option>
	  				<option value="java">Java</option>
	  				<option value="Python">Python</option>
	  				<option value="CO">Computer Organisation</option>
	  				<option value="flat">FLAT</option>
					</select>
				</div>
				<div class="fileinput">
					<h4>Upload the Screenshot/ Photo</h4>
                    <p>*To upload multiple images try converting to pdf and upload</p>
					<input type="File" name="file" required>
				</div>
				<div>
					<h4>Tell something about your doubt</h4>
					<textarea rows =10 cols=50 name="doubt-text" maxlength="1000" placeholder="Sir, Can you explain me the above mentioned doubt"></textarea>
				</div>
				<div class="submitinput">
					<input type="submit" name="submit">
				</div>
    		</form>
    	</section>

    </section> 
    <footer style="background: black;">
        <section>
            <p style="color: white;text-align: center;padding: 25px;">Copyrights &#169; kiranmaruhti2k21</p>
        </section>
    </footer>

</body>
</html>

<?php 
}else{

    header("Location: index.php");
    exit();
}
?>