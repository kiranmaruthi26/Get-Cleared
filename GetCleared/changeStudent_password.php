<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_chnagePass.css">
    <link rel="stylesheet" type="text/css" href="./css/responsivecss.css">
    <link rel="icon" href="/images/icon.png">
    <title>Changer Student Password - GetCleared</title>
    <script>
        function openNav() {
              document.getElementById("mySidenav").style.width = "250px";
            }
            
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
    </script>
    <style type="text/css">
        /*header nav ul li a{
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
        .errorDiv{
            background: #FBCDC9;
            color: #CC1506;
            border-radius: 20px;
        }
        .successDiv{
            background: #B3F684;
            color: #367708;
            border-radius: 20px;
        }*/
    </style>
</head>
<body>
    <section>
         <header class="head-container">
            <span style="font-size:50px;cursor:pointer" onclick="openNav()" class="menubutton">&#9776;</span>
            <div class="titleSection">
                <h1 class="headTitle">GetCleared</h1>
                <h3>Hello, <?php echo $_SESSION['fname'];?></h3>
            </div>
            <nav>
                <ul class="navlist">
                    <li class="menu"><a href="./home-faculty.php">Home</a></li>
                    <li class="menu"><a href="./solve-problem.php">New Problem</a></li>
                    <li class="menu"><a href="./solved-problems.php">Solved Problems</a></li>
                    <li class="menu"><a href="./IDE/online_ide.php">Start Coding</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
             <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="./home-faculty.php">Home</a>
              <a href="./solve-problem.php">New Problem</a>
              <a href="./solved-problems.php">Solved Problems</a>
              <a href="./IDE/online_ide.php">Start Coding</a>
              <a href="logout.php">LOGOUT</a></li>
            </div>
        </header>
    </section> 

    <section class="main-container">
        <form class="form-container" action="update-student-fac-password.php" method="post">
            <div>
                <h2>Change Student Password</h2>
            </div>
            <?php if(isset($_GET['error'])){?>
                <div class="errorDiv"><?php echo $_GET['error'];}?></div>
            <?php if(isset($_GET['success'])){?>
                <div class="successDiv"><?php echo $_GET['success'];}?></div>
            <div>
                <input type="text" name="rollnumber" placeholder="Roll Number">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div>
                <input type="password" name="cpassword" placeholder="Conform Password">
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