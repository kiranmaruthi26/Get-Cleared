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
    <title>Registerted Students - GetCleared</title>
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
                                    <a class="nav-link active"  href="./home-faculty">Home</a>
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>Menu
                        </button>
                </div>
            </nav>

        </header>

        <?php 
            include 'db.php';

            $student = "SELECT * FROM students ORDER BY username ASC";
            $result = mysqli_query($conn,$student);



            //Counting accounts

            $student_count = "SELECT * FROM students ORDER BY username ASC";
            $result_count = mysqli_query($conn,$student);
            $total = mysqli_num_rows($result_count);
            if($total>0){
                $unverfied = 0;
                while($row_count = mysqli_fetch_array($result_count)){
                    if($row_count['verification'] == "unverified"){
                        $unverfied++;
                    }
                }

                $verfied = $total - $unverfied;
            }

        ?>
        <main class="container rounded bg-white" >
            <h3 class="text-center fw-light">Registered Students</h3>
            <div class="container">
                <h3 class="fw-normal fs-4">Accounts Status</h3>
                <h4 class="fw-light fs-5">Verified Accounts : <span class="text-success fw-bold"><?php echo $verfied;?></span></h4>
                <h4 class="fw-light fs-5">Unverified Account : <span class="text-danger fw-bold"><?php echo $unverfied;?></span></h4>
                <h4 class="fw-light fs-5">Total Registered Account : <span class="text-warning fw-bold"><?php echo $total;?></span></h4>
            </div>

            </div>
            
            <!--Highest Logins -->
            
             <?php 
                $sql_top = "SELECT * FROM students WHERE track_login = (SELECT MAX(track_login) from students)";
                $result_top = mysqli_query($conn,$sql_top);
                if(mysqli_num_rows($result_top)>0){ ?>
                <h3 class="text-center fw-light mt-5">🎉 Top User 🎉</h3>
            <div>
            <div style="overflow-x:auto;" class="rounded-3 bg-white p-3">
           

            <table class="table table-info table-striped table-hover rounded-3 shadow-lg">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Roll Number </th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Section</th>
                  <th scope="col">Phone</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Status</th>
                  <th scope="col">Registered on</th>
                  <th scope="col">Login count</th>
                  <th scope="col">Recent Login</th>
                </tr>
              </thead>
               <tbody>
              <?php 
                $count = 1;
                while($row = mysqli_fetch_array($result_top)){
                        if($row['verification'] == 'verified'){
                    ?>
                 
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['section']; ?></td>
                      <td><?php echo $row['phonenumber']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['verification']; ?></td>
                      <td><?php echo $row['datetime']; ?></td>
                      <td><?php echo $row['track_login']; ?></td>
                      <td><?php echo $row['recent_login']; ?></td>
                    </tr>
                    
                  
          <?php 
                $count++;
                }
            }
            ?>
            </tbody>
            </table>

            <?php  }

            ?>
        </div>
            
            <!--End Loings -->
            
            
            <h3 class="text-center fw-light mt-5">Verified Accounts</h3>
            
            

        <div>
            <div style="overflow-x:auto;" class="rounded-3 bg-white p-3">
            <?php 
                if(mysqli_num_rows($result)>0){ ?>

            <table class="table table-success table-striped table-hover rounded-3 shadow-lg">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Roll Number </th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Section</th>
                  <th scope="col">Phone</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Status</th>
                  <th scope="col">Registered on</th>
                  <th scope="col">Login count</th>
                  <th scope="col">Recent Login</th>
                </tr>
              </thead>
               <tbody>
              <?php 
                $count = 1;
                while($row = mysqli_fetch_array($result)){
                        if($row['verification'] == 'verified'){
                    ?>
                 
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['section']; ?></td>
                      <td><?php echo $row['phonenumber']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['verification']; ?></td>
                      <td><?php echo $row['datetime']; ?></td>
                      <td><?php echo $row['track_login']; ?></td>
                      <td><?php echo $row['recent_login']; ?></td>
                    </tr>
                    
                  
          <?php 
                $count++;
                }
            }
            ?>
            </tbody>
            </table>

            <?php  }

            ?>
        </div>
            <h3 class="text-center fw-light mt-5">Unverified Accounts</h3>

        <div>
            
        </div>

        <div style="overflow-x:auto;" class="rounded-3 bg-white p-3">
            <?php 

                $student = "SELECT * FROM students ORDER BY username ASC";
                $result = mysqli_query($conn,$student);
                if(mysqli_num_rows($result)>0){ ?>

            <table class="table table-danger table-striped table-hover rounded-3 shadow-lg">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Roll Number </th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Section</th>
                  <th scope="col">Phone</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Status</th>
                  <th scope="col">Registered on</th>
                  <th scope="col">Login count</th>
                  <th scope="col">Recent Login</th>
                </tr>
              </thead>
               <tbody>
              <?php 
                $count = 1;
                while($row = mysqli_fetch_array($result)){
                    if($row['verification'] == 'unverified'){
                    ?>
                 
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['section']; ?></td>
                      <td><?php echo $row['phonenumber']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['verification']; ?></td>
                      <td><?php echo $row['datetime']; ?></td>
                      <td><?php echo $row['track_login']; ?></td>
                      <td><?php echo $row['recent_login']; ?></td>
                    </tr>
                    
                  
          <?php 
                $count++;
                }
            }?>
            </tbody>
            </table>

            <?php  }

            ?>
        </div>


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