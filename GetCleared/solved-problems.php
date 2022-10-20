<?php 
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['course'])){
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
        <link rel="icon" href="./images/icon.png">
        <title>Solved Problem - GetCleared</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="./JS/upload_profile.js"></script>
        <script type="text/javascript" src="./JS/getProfilePics.js"></script>
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 container">
                <div class="container-fluid">
                    <div class="navbar">
                        <div style="display: block;">
                            <a class="navbar-brand" href="#">GetCleared</a>
                            <div>
                                <h6 class="text-center">Hello, <?php echo $_SESSION['fname']; ?></h6>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var count = 0;
                        function showNav(){
                            if (count === 0){
                                document.getElementById("navbar-list").style.display = "block";
                                count++;
                                console.log("if :"+count);
                            }
                            else{
                                document.getElementById("navbar-list").style.display = "none";
                                count = 0;
                                console.log(count);
                            }
                            //console.log(count);
                        }
                    </script>
                    <div class="m-2" id="navbar-list" style="display:none;">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active"  href="./profile/">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" data-target="#sub-nav">
                                    <span>Menu</span>
                              </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-faculty">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>

                        <div class="collapse navbar-collapse" id="sub-nav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active"  href="#">Home</a>
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
                                    <a class="nav-link" href="./materials/viewmaterials">Materials</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./IDE/online_ide">Start Coding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-faculty">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>Menu
                        </button>
                </div>-->


                <div class="float-end" style="margin-right:10%;">
                     <button class="navbar-toggler rounded-circle" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="showNav()">
                        <span >
                            <img src="./profile/photos/profile-dummy.png" width="40" height="40" class="rounded-circle" id="profile_icon">
                        </span>
                    </button>
                  <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbar-list-4">
                          <img src="./profile/photos/profile-dummy.png" width="40" height="40" class="rounded-circle" id="profile_photo">
                        </a>
                        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink" id="main-menu">
                          <a class="dropdown-item" href="./profile/">Profile</a>
                            <a class="dropdown-item dropdown-toggle" href="#" id="menu-list" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#menu">
                                
                                <span>Menu</span>
                              </a>
                        <a class="dropdown-item" href="./changePassword-faculty">Change Password</a>
                          <a class="dropdown-item" href="./logout.php">Log Out</a>
                        </div>

                        <div class="dropdown-menu bg-light" aria-labelledby="menu-list" id="menu">
                            <a class="dropdown-item " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#main-menu">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                            </a>
                            <a class="dropdown-item" href="./home-faculty">Home</a>
                            <a class="dropdown-item" aria-current="page" href="./liveSessions/courseModule">Courses Module</a>
                            <a class="dropdown-item" href="./solve-problem">New Problem</a>
                            <a class="dropdown-item" href="./solved-problems">Solved Problems</a>
                            <a class="dropdown-item" href="./materials/viewmaterials">Materials</a>
                            <a class="dropdown-item" href="./knowledgecenter/add_topic">Knowledge Center</a>
                            <a class="dropdown-item" href="./IDE/online_ide">Start Coding</a>
                        </div>
                      </li>   
                    </ul>
                  </div>
                </div>
            </nav>

        </header>


    <div class="container text-center">
        <h4 class="text-uppercase fs-3">Solved Doubts on <?php echo $_SESSION['course'];?> course</h4>
    </div>

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
<main class="container-fluid d-flex">
    
    

    <?php 
    include "db.php";

    $section = $_SESSION['section'];
    $course = $_SESSION['course'];
    $sql = "SELECT * FROM faculty_solution WHERE faculty_id='".$_SESSION['faculty_id']."' ";
    $result = mysqli_query($conn, $sql);
    $count = 0;
    ?>
    
    <?php  if(mysqli_num_rows($result) > 0){?>
        <div class="w-100" style="overflow-x:auto;">
            <table class="table table-striped table-hover text-center shadow rounded" >
                <thead>
                    <tr>
                      <th scope="col">Question no</th>
                      <th scope="col">Roll Number</th>
                      <th scope="col">Solution</th>
                      <th scope="col">File</th>
                      <th scope="col">Solved on</th>
                  </tr>
              </thead>

              


              <?php while($row = mysqli_fetch_array($result)){
                $count = $count+1;
                $popId = "popDiv".$count;
                $popId_img = "popDivImg".$count;?>

                <tbody>
                    <tr>
                      <th scope="row"><?php echo $row['problem_id'];?></th>
                      <td><?php echo $row['rollnumber'];?></td>
                      <td>
                        <button type=button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target=<?php echo "#".$popId?>>Open Solution</button>
                    </td>
                    
                    <?php 
                    if($row['image'] == 0){?>
                        <td><p style="font-size: 10px;">File not Uploaded</p></td>
                    <?php  }else{?>
                        <td>
                            <!-- Button trigger modal image -->
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target=<?php echo "#".$popId_img?>>
                                view
                            </button>
                        </td>
                    <?php }?>
                    

                    <td><?php echo $row['datetime'];?></td>
                </form>
            </td>
        </tr>
    </tbody>


    <!-- Modal doubt text-->
    <div class="modal fade " id=<?php echo $popId ?> tabindex=-1 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Solution : <?php echo $row['id'];?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <textarea class="w-100 bg-white" col="50" style="height: 400px;border:none;" disabled><?php echo $row['solution'] ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>



<!-- Display Image -->
<div class="modal fade" tabindex="-1" id=<?php echo $popId_img?> role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Solution File :  <?php echo $row['id'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <a target="_blank" href=<?php echo "./faculty_uploads/".$row['image'];?>>
            <img class="w-100" alt="Open document" src=<?php echo "./faculty_uploads/".$row['image'];?>>
        </a>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>

<?php }?>

</table>
</div>

<?php }

else{
}



?>

</table>

</main>


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

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}else{

    header("Location: index");
    exit();
}
?>  