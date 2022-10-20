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
        <link rel="icon" href="/images/icon.png">
        <title>Changer Password - GetCleared</title>
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
    <header class=" bg-light d-flex">

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
                                <a class="nav-link"  href="./home-faculty">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./liveSessions/courseModule">Courses Module</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./solve-problem">New Problem</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./solved-problems">Solved Problems</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./knowledgecenter/add_topic">Knowledge Center</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="./materials/viewmaterials">Materials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./IDE/online_ide">Start Coding</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Change Password</a>
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
    <section class="container p-5">
        <form class="form-container" action="update-faculty-password.php" method="post">
            <div class="form-group">
                <h2 class="form-title text-center text-uppercase">Change Password</h2>
            </div>
            <div class="form-group">
                <input type="text" name="faculty_id" placeholder="Faculty Id" value="<?php echo $_SESSION['faculty_id'] ?>" hidden>
                <input type="text"  placeholder="Faculty Id" value="<?php echo $_SESSION['faculty_id'] ?>" disabled class="form-control m-2">
            </div>
            <div class="form-group">
                <input type="text" name="oldPassword" placeholder="Old Password" class="form-control m-2" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="New Password" class="form-control m-2" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <div class="form-group">
                <input type="password" name="cpassword" placeholder="Conform New Password" class="form-control m-2" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn w-100 btn-info m-2">
            </div>
        </form>
    </section>
    <!-- Footer -->
    <footer class="page-footer font-small blue bg-light">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="http://kiranmaruthi.getcleared.in/" target=_blank>kiranmaruthi2k21</a>
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

    header("Location: index");
    exit();
}
?>  