<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_chnagePass.css">
    <title>Changer Password - GetCleared</title>
    
</head>
<body>
    <section>
         <header class="head-container">
            <div class="titleSection">
                <h1 class="headTitle">GetCleared</h1>
                <h3>Hello, <?php echo $_SESSION['fname'];?></h3>
            </div>
            <nav>
                <ul>
                    <li class="menu"><a href="./home-faculty.php">Home</a></li>
                    <li class="menu"><a href="./solve-problem.php">New Problem</a></li>
                    <li class="menu"><a href="./solved-problems.php">Solved Problems</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
        </header>
    </section> 

    <section class="main-container">
        <form class="form-container" action="update-faculty-password.php" method="post">
            <div>
                <h2>Change Password</h2>
            </div>
            <?php if(isset($_GET['error'])){?>
                <div class="errorDiv"><?php echo $_GET['error'];}?></div>
            <?php if(isset($_GET['success'])){?>
                <div class="successDiv"><?php echo $_GET['success'];}?></div>
            <div>
                <input type="text" name="faculty_id" placeholder="Faculty Id" value="<?php echo $_SESSION['faculty_id'] ?>" hidden>
                <input type="text"  placeholder="Faculty Id" value="<?php echo $_SESSION['faculty_id'] ?>" disabled>
            </div>
            <div>
                <input type="text" name="oldPassword" placeholder="Old Password">
            </div>
            <div>
                <input type="password" name="password" placeholder="New Password">
            </div>
            <div>
                <input type="password" name="cpassword" placeholder="Conform New Password">
            </div>
            <div>
                <input type="submit" name="submit">
            </div>
        </form>
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