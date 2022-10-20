<?php 
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['fname'])){



?>


<!DOCTYPE html>
<html>
<head>
    <title>Send Solution - GetCleared</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="icon" href="./images/icon.png">
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
                		header("Location: solve-problem?error=email Sending faild");
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
                    header("Location: submit-solution?error=solution field is required");
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
                                    header("Location: solve-problem?success=Your Solution was successfully submitted with GetCleared");
                                }
                            }else{
                                header("Location: solve-problem?error=error in connection student database");
                            }
                            
                        }

                    }else{
                        header("Location: solve-problem?error=Error in connecting Data Base, Please try again later");
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