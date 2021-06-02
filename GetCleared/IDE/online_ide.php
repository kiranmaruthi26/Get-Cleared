<?php 
session_start();

if(isset($_SESSION['id']) && (isset($_SESSION['name'])  || isset($_SESSION['fname'])   )){
    
    if(isset($_SESSION['name'])){
        $name = $_SESSION['name'];
    }elseif(isset($_SESSION['fname'])){
        $name = $_SESSION['fname'];
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>IDE - GetCleared</title>
	<link rel="stylesheet" type="text/css" href="./ide_css/style_ide.css">
	<link rel="icon" href="../images/icon.png">
</head>
<body>

	<div class="header">
	    <div>
	        <h3>Get Cleared Online IDE</h3>
	        <h5>Logged in as <?php echo $name;?></h5>
	   </div>

		<div class="control-panel">
			Select Language:
			&nbsp; &nbsp;

			<select id="language" class="language" onchange="changeLanguage()">
				<option value="c">C</option>
				<option value="cpp">C++</option>
				<option value="python">Python</option>
				<option value="java">JAVA</option>
			</select>

		</div>

	</div>
	
	<div class="editor" id="editor">
		<!-- <div class="loader"></div> -->
		<!-- <iframe src="https://www.jdoodle.com/embed/v0/3kVn" width="100%" height="650" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen id="iframe"></iframe> -->

		<iframe src="https://www.programiz.com/c-programming/online-compiler/" width="100%" height="650" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen id="iframe"></iframe>


	</div>
	<!-- <div class="button-container">
		<button class="btn" onclick="excuteCode()">Run</button>
	</div>
	
	<div class="output"></div> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--<script src="js/ide.js"></script>
	<script src="js/lib/ace.js"></script>
	<script src="js/lib/theme-monokai.js"></script> -->
	<script src="ide_js/ide.js"></script>
</body>
</html>


<?php 
}else{

    header("Location: ../index.php");
    exit();
}
?>