<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_home-faculty.css">
    <title>Home - GetCleared</title>
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
                    <li class="menu"><a href="#">Home</a></li>
                    <li class="menu"><a href="./solve-problem.php">New Problem</a></li>
                    <li class="menu"><a href="./solved-problems.php">Solved Problems</a></li>
                    <li class="menu"><a href="./changePassword-faculty.php">Change Password</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
        </header>
    </section> 

        <?php 
            include "db.php";

            $course = $_SESSION['course'];
            $sql = "SELECT * FROM student_doubt WHERE course='".$course."' AND status='unsolved' ";
            $result = mysqli_query($conn, $sql);
            $count_unsolved = 0;

        ?>

    <section class="main-container">
        
        <section class="upsection">
            <section class="getDout">
                <section class="imgContainer">
                    <a href="./solve-problem.php"><img src="./images/solved-question.jpg"></a>
                </section>
                <section>
                    <h2> 
                        <?php 
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    if($row['status'] == "unsolved"){
                                        $count_unsolved = $count_unsolved+1;
                                        //echo $count_unsolved;
                                    }
                                }
                            }

                        ?>
                <?php if($count_unsolved>0){?>                            
                    <a href="./solve-problem.php">Problems Yet to solve : <?php echo $count_unsolved;?> </a></h2>
                <?php }else{?>
                    <a href="./solve-problem.php">You have solved all the problems </a></h2>
                <?php }?>
                </section>
            </section>
            <section class="getDout">
                 <section class="imgContainer">
                    <a href="./solved-problems.php"><img src="./images/check-solutions.png"></a>
                </section>
                <section>
                    <h2><a href="./solved-problems.php">Check solved problems</a></h2>
                </section>
            </section>
        </section>
        
    </section> 
    <section class="studentPassword">
        <h3>To change the password of your students login - <a href="./changeStudent_password.php">Click here</a></h3>
    </section>
    <footer style="background: black;">
        <section>
            <p style="color: white;text-align: center; padding: 10px;">Copyrights &#169; kiranmaruhti2k21</p>
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