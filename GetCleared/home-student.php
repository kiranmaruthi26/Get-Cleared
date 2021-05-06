<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_home-student.css">
    <link rel="stylesheet" type="text/css" href="./css/responsivecss.css">
    <title>Home - GetCleared</title>
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
                <h3>Hello, <?php echo $_SESSION['name'];?> 👋👋</h3>
            </div>
            <nav>
                <ul class="navlist">
                    <li class="menu"><a href="#">Home</a></li>
                    <li class="menu"><a href="./Ask-doubt.php">Ask a Doubt</a></li>
                    <li class="menu"><a href="./checksolutions.php">Solutions</a></li>
                    <li class="menu"><a href="./changePassword-student.php">Change Password</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>

            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="#">Home</a>
              <a href="./Ask-doubt.php">Ask a Doubt</a>
              <a href="./checksolutions.php">Solutions</a>
              <a href="./changePassword-student.php">Change Password</a>
              <a href="logout.php">LOGOUT</a></li>
            </div>
        </header>
    </section> 

    <section class="main-container">
        
        <section class="upsection">
            <section class="askDout">
                <section class="imgContainer">
                    <a href="./Ask-doubt.php"><img src="./images/Ask-a-doubt.png"></a>
                </section>
                <section>
                    <h2><a href="./Ask-doubt.php" class="buttonClass">Ask a doubt</a></h2>
                </section>
                <?php if(isset($_GET['success'])){?>
                <section class="success-submit">
                    <div>
                        <span onclick="this.parentElement.style.display='none';">&times;</span>
                        <p><?php echo $_GET['success'];?></p>
                    </div>
                </section>
                <?php }?>
            </section>
            <section class="askDout">
                 <section class="imgContainer">
                    <a href="./checksolutions.php"><img src="./images/solution.jpg"></a>
                </section>
                <section>
                    <h2><a href="./checksolutions.php" class="buttonClass">Check for Solution</a></h2>
                </section>
            </section>
        </section>
        
    </section> 
    <footer style="background: black;">
        <section>
            <p style="color: white;text-align: center; padding: 25px;">Copyrights &#169; kiranmaruhti2k21</p>
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