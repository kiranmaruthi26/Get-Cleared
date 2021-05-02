<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_chnagePass.css">
    <title>Change Password - GetCleared</title>
    <!-- <style type="text/css">
        header nav ul li a{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            text-decoration: none;
            color: blue;
            font-size: 20px;
        }
        .titleSection{
            margin-left: 45px;
        }
        .logout:hover{
            color: red;
            box-shadow: 0px 2px 5px 0px;
            border-radius: 20px;
            padding: 8px;
        }
        .getDout h2 a{
            text-decoration: none;
            color: black;
            border:2px solid;
            display: flex;
            justify-content: center;
            border-radius: 10px;
            background:  #000099; 
            color: white;
            padding: 10px;
        }
        .buttonClass:hover{
            background-color: #0A4E68;
        }
        .menu a:hover{
            color: #7305A4;
            box-shadow: 0px 2px 5px 0px;
            border-radius: 20px;
            padding: 8px;
        }
        .headTitle{
            letter-spacing: 5px;
            font-size: 30px;
            text-shadow: 1px 1px 10px;
            color: #AD3A04 ;

        }
        .form-container{
            margin-top: 10px;
            padding: 30px;
        }
        .errorDiv{
            background: #FBCDC9;
            color: #CC1506;
            border-radius: 20px;
        }
        .successDiv{
            background: #B3F684;
            color: #367708;
            border-radius: 20px;
        }

    </style> -->
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
                    <li class="menu"><a href="./home-faculty.php">Home</a></li>
                    <li class="menu"><a href="./solve-problem.php">New Problem</a></li>
                    <li class="menu"><a href="./solved-problems.php">Solved Problems</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
        </header>
    </section> 

    <section class="main-container">
        <form class="form-container" action="update-student-password.php" method="post">
            <div>
                <h2>Change Password</h2>
            </div>
            <?php if(isset($_GET['error'])){?>
                <div class="errorDiv"><?php echo $_GET['error'];}?></div>
            <?php if(isset($_GET['success'])){?>
                <div class="successDiv"><?php echo $_GET['success'];}?></div>
            <div>
                <input type="text" name="rollnumber" placeholder="Rollnumber" value="<?php echo $_SESSION['username'] ?>"  hidden>
                <input type="text" placeholder="Rollnumber" value="<?php echo $_SESSION['username'] ?>" disabled>
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