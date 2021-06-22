<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name'])){

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
                                    <a class="nav-link active"  href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">Courses Module</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./Ask-doubt">Ask a doubt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./checksolutions">Solutions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./knowledgecenter/add_topic">Knowledge Center</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./IDE/online_ide">Start Coding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-student">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout">Logout</a>
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
                                <li>Live session</li>
                                <li>Assignments</li>
                            </ul>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="#" desiabled>Open Module</a>
                            </div>
                        </div>
                    </div>
                
                <div class="col mt-3">
                    <div class="card  border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/Ask-a-doubt.png" alt=LogoImage class="card-image-top rounded" style="height:220px;">
                        <div class="card-body">
                            <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Clear my Doubt</h5>

                        </div>
                            <p class="card-text text-center text-info">Why wait clear your doubt now with GetCleared</p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./Ask-doubt">Ask a Dout</a>
                            </div>
                        </div>
                    </div>


                    <div class="col mt-3">
                    <div class="card border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/solution.jpg" alt=LogoImage class="card-image-top" style="height:220px;">
                        <div class="card-body">   
                         <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Check you solutions</h5>
                        </div>
                            <p class="card-text text-center text-info">Find the solutions for you doubts here</p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./checksolutions">Check</a>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-3">
                    <div class="card border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/knowledge.jpeg" alt=LogoImage class="card-image-top" style="height:220px;">
                        <div class="card-body">   
                         <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Knowledge Center</h5>
                        </div>
                            <p class="card-text text-center text-info">Share and gain Knowledge on trending topics</p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./knowledgecenter/add_topic">Participate</a>
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
                                    <a class="btn btn-primary text-center" href="./IDE/online_ide">Start Coding</a>
                            </div>
                        </div>
                    </div>

            </div>


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