<?php 
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['fname'])){



?>


<!DOCTYPE html>
<html>
<head>
    <title>Ask a Doubt - GetCleared</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="icon" href="./images/icon.png">
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
                                    <a class="nav-link"  href="./home-faculty.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="./liveSessions/courseModule.php">Courses Module</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./solve-problem.php">New Problem</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Solved Problems</a>
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
        <div class="container text-center">
            <h2 class="title">Your students are wating for your solution reply them quick!</h2>
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
        
        <section class="container">
            <?php 
            ob_start();
                if(empty($_GET['Qid'])){
                     $question_id='Solution Submitted';
                    
                }else{
                    $question_id = $_GET['Qid'];
                }

            ?>
            <!--<input type="text" name="question-id" value='<?php echo $question_id;?>' disabled class="rollinput">-->
            <form method="post" action="" enctype="multipart/form-data" class="p-3">
                
                <div class="form-group">
                    <h4 class="col-form-label">Faculty ID</h4>
                    <input class="form-control" type="text" name="faculty-id" value='<?php echo $_SESSION['faculty_id'];?>' disabled class="rollinput">
                </div>
                <div class="form-group">
                    <h4 class="col-form-label">Problem ID</h4>
                    
                   <input class="form-control" type="text" name="question_no" value="<?php echo  $question_id;?>" disabled class="rollinput">
                   <!-- <input type="text" name="question_no" value="0012" class="rollinput"> -->
                </div>
                <div class="form-group">
                    <h4 class="col-form-label">Upload the Screenshot/ Photo</h4>
                    <p class="m-0 text-danger">*To upload multiple images try converting to pdf and upload</p>
                    <p class="m-0 text-danger">*File must be lessthan 2MB</p>
                    <input type="File" name="file" class="form-control">
                </div>
                <div class="form-group">
                    <h4 class="col-form-label">Explain the problem</h4>
                    <textarea rows =10 cols=50 name="solution_text" class="form-control" placeholder="Dear Student, So here is this solution" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn w-100 btn-info mt-3">
                </div>
                <div class="form-footer text-center">
				    <h4 class="col-form-label">🤔🤔 I Changed my Mind 🤔🤔</h4>
				</div>
				<div class="form-footer text-center">
				    <a href="./home-faculty.php" class="col-form-label btn btn-secondary btn-sm">Go back to home page</a>
				</div>
            </form>
        </section>


        <?php 
            include "db.php";

            if(isset($_POST['submit'])){

                function sendEmail($toMail,$sname,$problemId,$datetime){
                    ini_set( 'display_errors', 1 );
                    error_reporting( E_ALL );
                    $from = "support@getcleared.in";
                    $to = $toMail;
                    $subject = "GetCleared - Solution";
                    $message = "<h2>!! Your Question has been resolved !!</h2>
                    <h2>Dear $sname</h2>
                    <h3>Your Problem with problem Id: $problemId has been resolved on $datetime</h3>
                    <h5>For any support revert back to this mail</h5>
                    <p>With Regards</p>
                    <p>Kiran Maruthi Kuna</p>
                    <p>Developer - getcleared.in</p>";
                    $headers = "From:" . $from."\r\n";
                    $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
                    if(!mail($to,$subject,$message, $headers)) {
                		header("Location: solve-problem.php?error=email Sending faild");
        			    exit();	
                    }
                }
                
                function validate($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $faculty_id = $_SESSION['faculty_id'];
                $solution = mysqli_real_escape_string($conn,validate($_POST['solution_text']));
                $problem_id = $_GET['Qid'];
                $rollnumber = $_GET['rollnumber'];
                $fname = $_SESSION['name'];
                
                if(empty($solution)){
                    header("Location: submit-solution.php?error=solution field is required");
                    exit();
                }else{

                    // File upload path
                    $fullFileName =$_FILES["file"]["name"];
                    $tmepName = $_FILES["file"]["tmp_name"];
                    $fileType = $_FILES["file"]["type"];
                    $uploads_dir = 'faculty_uploads';
                    $deforeFileName = substr($fullFileName, 0, strpos($fullFileName, '.'));
                    if(empty($_FILES["file"]["name"])){
                        $newFileName = 0;
                    }else{
                        $newFileName = uniqid("",true).'-'.$faculty_id.''.ltrim($fullFileName,$deforeFileName);
                    }
                    move_uploaded_file($tmepName, $uploads_dir.'/'.$newFileName);
                    date_default_timezone_set("Asia/Kolkata");
                    $time = date("h:i:s");
                    $date = date("Y-m-d");
                    $dateTime = $date." ".$time;

                    $insert = "INSERT INTO `faculty_solution` (`problem_id`, `faculty_id`, `rollnumber`,`image`, `solution`,`datetime`) VALUES ('$problem_id', '$faculty_id','$rollnumber', '$newFileName', '$solution',NOW())";
                    if(mysqli_query($conn,$insert)){
                        $sql_update = "UPDATE `student_doubt` SET `status` = 'solved' WHERE `student_doubt`.`id` = '".$problem_id."'";
                        if(mysqli_query($conn,$sql_update)){
                            
                            $sql_student ="SELECT * FROM students WHERE username='".$rollnumber."' ";
                            if($result_student = mysqli_query($conn,$sql_student)){
                                if(mysqli_num_rows($result_student)){
                                    $row = mysqli_fetch_assoc($result_student);
                                    $toMail = $row['email'];
                                    $sname = $row['name'];
                                    sendEmail($toMail,$sname,$question_id,$dateTime);
                                    header("Location: solve-problem.php?success=Your Solution was successfully submitted with GetCleared");
                                }
                            }else{
                                header("Location: solve-problem.php?error=error in connection student database");
                            }
                            
                        }

                    }else{
                        header("Location: solve-problem.php?error=Error in connecting Data Base, Please try again later");
                    }
                }



            }/*else{

                //header("Location: submit-solution.php?error=returning back");
                //echo "hello";
                exit(); 
            }*/
        ?>

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