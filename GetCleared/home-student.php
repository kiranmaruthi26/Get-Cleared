<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_home-student.css">
    <title>Home - GetCleared</title>
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
                    <li class="menu"><a href="#">Home</a></li>
                    <li class="menu"><a href="./Ask-doubt.php">Ask a Doubt</a></li>
                    <li class="menu"><a href="./checksolutions.php">Solutions</a></li>
                    <li class="menu"><a href="./changePassword-student.php">Change Password</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
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
                    <div><?php echo $_GET['success'];?></div>
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