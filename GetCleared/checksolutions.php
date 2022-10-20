<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['username'])){

?>


<!DOCTYPE html>
<html>
<head>
	<title>Check your solution - GetCleared</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="icon" href="./images/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

</head>
<body>
	<!-- Student nav-->

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
                                <h6 class="text-center">Hello, <?php echo $_SESSION['name']; ?></h6>
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
                                    <a class="nav-link" href="./changePassword-student">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>

                        <div class="collapse navbar-collapse" id="sub-nav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link"  href="./home-student.php">Home</a>
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
                                    <a class="nav-link" href="./materials/viewmaterials">Materials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./IDE/online_ide">Start Coding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./changePassword-student">Change Password</a>
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
                                        <a class="dropdown-item" href="./changePassword-student">Change Password</a>
                                        <a class="dropdown-item" href="./logout.php">Log Out</a>
                                    </div>

                                    <div class="dropdown-menu bg-light" aria-labelledby="menu-list" id="menu">
                                        <a class="dropdown-item " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#main-menu">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                        </a>
                                        <a class="dropdown-item"  href="./home-student.php">Home</a>
                                        <a class="dropdown-item" aria-current="page" href="#">Courses Module</a>
                                        <a class="dropdown-item" href="./Ask-doubt">Ask a doubt</a>
                                        <a class="dropdown-item" href="./checksolutions">Solutions</a>
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


    <main class="container-fluid bg-light">


        <?php 
            include "db.php";

            $roll = $_SESSION['username'];
            $sql = "SELECT * FROM student_doubt WHERE rollnumber='".$roll."'";
            $result = mysqli_query($conn, $sql);
            $count = 0;?>

            <?php  if(mysqli_num_rows($result) > 0){?>
                <div class="w-100" style="overflow-x:auto;">
            <table class="table table-striped table-hover text-center shadow rounded" >
                <thead>
                    <tr>
                      <th scope="col">Question no</th>
                      <th scope="col">Roll Number</th>
                      <th scope="col">Course</th>
                      <th scope="col">Doubt</th>
                      <th scope="col">File</th>
                      <th scope="col">Solution</th>
                      <th scope="col">Asked on</th>
                  </tr>
              </thead>
         <?php while($row = mysqli_fetch_array($result)){
                $count = $count+1;
                $popId = "popDiv".$count;
                $popId_img = "popDivImg".$count;?>

                <tbody>
                    <tr>
                      <th scope="row"><?php echo $row['id'];?></th>
                      <td><?php echo $row['rollnumber'];?></td>
                      <td><?php echo $row['course'];?></td>
                      <td>
                        <button type=button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target=<?php echo "#".$popId?>>Open Doubt</button>
                    </td>

                    <?php 
                    if($row['images'] == 0){?>
                        <td><p style="font-size: 10px;">File not Uploaded</p></td>
                    <?php  }else{?>
                        <td>
                            <!-- Button trigger modal image -->
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target=<?php echo "#".$popId_img?>>
                                view
                            </button>
                        </td>
                    <?php }?>
                    
                    <td class=buttonField> 
                        <form method="get" action="view-solution.php">
                        <input value="<?php echo $row['id']?>" name =Qid hidden>
                        <?php 
                            $sql_check = "SELECT * FROM faculty_solution WHERE problem_id='".$row['id']."' ";
                            $checked_result = mysqli_query($conn,$sql_check);
                            if(mysqli_num_rows($checked_result)){?>
                                <button type=submit target=_blank class="btn btn-sm btn-info">Check solution</button>
                            </form>

                            <?php }else{?>
                                <button type=submit target=_blank class="btn btn-sm btn-info" disabled>Not Yet Solved</button>
                            <?php }
                        ?>
                    </td>

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
            <textarea class="w-100 bg-white" col="50" style="height: 400px;border:none;" disabled><?php echo $row['doubt'] ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>



<!-- Display Image -->
<div class="modal fade" tabindex="-1" id="<?php echo $popId_img?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Solution File :  <?php echo $row['id'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <a target="_blank" href=<?php echo "./student_uploads/".$row['images'];?>>
            <img class="w-100" alt="Open document" src=<?php echo "./student_uploads/".$row['images'];?>>
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
    echo "<h5 class=text-center>You haven't solved anything</h5>";
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