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
                                    <a class="nav-link"  href="./home-student">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">Courses Module</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./Ask-doubt">Ask a doubt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Solutions</a>
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

    header("Location: index");
    exit();
}
?>