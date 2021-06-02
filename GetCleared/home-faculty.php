<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="icon" href="./images/icon.png">
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
    <header class="bg-light d-flex">

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
                                    <a class="nav-link active"  href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="./liveSessions/courseModule.php">Courses Module</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./solve-problem.php">New Problem</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./solved-problems.php">Solved Problems</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./IDE/online_ide.php">Start Coding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-faculty.php">Change Password</a>
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


        <?php 
            include "db.php";

            $course = $_SESSION['course'];
            $section = $_SESSION['section'];
            $sql = "SELECT * FROM student_doubt WHERE course='".$course."' AND status='unsolved' AND section='".$section."'";
            $result = mysqli_query($conn, $sql);
            $count_unsolved = 0;

        ?>
        <main class="w-100 container mt-4">
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
            
            <div class="row row-cols-1 row-cols-md-2 row-cols-sm-1 row-cols-lg-3 w-100" style="margin-right: 0;">
 
                <div class="col mt-3">
                    <div class="card  border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/E-learning.jpg" alt=LogoImage class="card-image-top" style="height:220px;">
                        <div class="card-body">   
                         <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Courses Module</h5>
                        </div>
                            <ul class="card-text  text-info">
                                <li>Schedule Live session</li>
                                <li>Assig Assignments</li>
                            </ul>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./liveSessions/courseModule.php">Open Module</a>
                            </div>
                        </div>
                    </div>
                
                <div class="col mt-3">
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
                    <div class="card  border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/solved-question.jpg" alt=LogoImage class="card-image-top rounded" style="height:220px;">
                        <div class="card-body">
                            <?php if($count_unsolved>0){?>

                            <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Problems Yet to solve : <?php echo $count_unsolved;?></h5>
                        <?php }else{?>
                            <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Hurry You have solved everything</h5>

                            <?php }?>
                        </div>
                            <p class="card-text text-center text-warning"></p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./solve-problem.php">Solve Problem</a>
                            </div>
                        </div>
                    </div>


                    <div class="col mt-3">
                    <div class="card border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/check-solutions.png" alt=LogoImage class="card-image-top" style="height:220px;">
                        <div class="card-body">   
                         <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Check Solved Problems</h5>
                        </div>
                            <p class="card-text text-center text-warning"></p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./solved-problems.php">Check</a>
                            </div>
                        </div>
                    </div>

                    

                    <div class="col mt-3">
                    <div class="card border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/coding-practice.jpg" alt=LogoImage class="card-image-top" style="height:220px;">
                        <div class="card-body">   
                         <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Practice Code</h5>
                        </div>
                            <p class="card-text  text-info text-center">Practice more and enhance skills</p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./IDE/online_ide.php">Start Coding</a>
                            </div>
                        </div>
                    </div>

            </div>


        <section class="container-fluid mt-5">
            <h3 class="fs-6">To change the password of your students login - <a href="./changeStudent_password.php">Click here</a></h3>
        </section>

        </main>
    
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