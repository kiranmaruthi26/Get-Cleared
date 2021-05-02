<?php 
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['fname'])){



?>


<!DOCTYPE html>
<html>
<head>
    <title>Ask a Doubt - GetCleared</title>
    <link rel="stylesheet" type="text/css" href="./css/style_submitSolution.css">
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
                    <li class="menu"><a href="./home-faculty.php">Home</a></li>
                    <li class="menu"><a href="./solve-problem.php">New Problem</a></li>
                    <li class="menu"><a href="./solved-problems.php">Solved Problems</a></li>
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
        </header>
    </section>
    <section>
            <h2 class="title">Your students are wating for your solution reply them quick!</h2>
    </section>
    <section class="doubt-container">
        
        <section class="formBody">
            <?php 
            ob_start();
                if(empty($_GET['Qid'])){
                     $question_id='Solution Submitted';
                    
                }else{
                    $question_id = $_GET['Qid'];
                }

            ?>
            <!--<input type="text" name="question-id" value='<?php echo $question_id;?>' disabled class="rollinput">-->
            <form method="post" action="" enctype="multipart/form-data">
                <?php if(isset($_GET['error'])){?>

                    <div class="attemptdivError"><?php echo $_GET['error']?></div>

                <?php }?>
                <?php if(isset($_GET['success'])){?>

                    <div class="attemptdivSuccess"><?php echo $_GET['success']?></div>

                <?php }?>
                <div>
                    <h4>Faculty ID</h4>
                    <input type="text" name="faculty-id" value='<?php echo $_SESSION['faculty_id'];?>' disabled class="rollinput">
                </div>
                <div>
                    <h4>Problem ID</h4>
                    
                   <input type="text" name="question_no" value="<?php echo  $question_id;?>" disabled class="rollinput">
                   <!-- <input type="text" name="question_no" value="0012" class="rollinput"> -->
                </div>
                <div class="fileinput">
                    <h4>Upload the Screenshot/ Photo</h4>
                    <input type="File" name="file" required>
                </div>
                <div>
                    <h4>Explain the problem</h4>
                    <textarea rows =10 cols=50 name="solution_text" placeholder="Dear Student, So here is this solution"></textarea>
                </div>
                <div class="submitinput">
                    <input type="submit" name="submit">
                </div>
            </form>
        </section>


        <?php 
            include "db.php";

            if(isset($_POST['submit'])){

                function validate($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $faculty_id = $_SESSION['faculty_id'];
                $solution = validate($_POST['solution_text']);
                $problem_id = $_GET['Qid'];
                $rollnumber = $_GET['rollnumber'];
                
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
                    $newFileName = uniqid("",true).'-'.$faculty_id.''.ltrim($fullFileName,$deforeFileName);
                    move_uploaded_file($tmepName, $uploads_dir.'/'.$newFileName);
                    date_default_timezone_set("Asia/Kolkata");
                    $time = date("h:i:s");
                    $date = date("Y-m-d");
                    $dateTime = $date." ".$time;

                    $insert = "INSERT INTO `faculty_solution` (`problem_id`, `faculty_id`, `rollnumber`,`image`, `solution`,`datetime`) VALUES ('$problem_id', '$faculty_id','$rollnumber', '$newFileName', '$solution',NOW())";
                    if($insert){

                    mysqli_query($conn,$insert);

                    $sql_update = "UPDATE `student_doubt` SET `status` = 'solved' WHERE `student_doubt`.`id` = '".$problem_id."'";
                    if(mysqli_query($conn,$sql_update)){
                        header("Location: solve-problem.php?success=Your Solution was successfully submitted with GetCleared");
                    }

                    }else{
                        header("Location: submit-solution.php?error=Error in connecting Data Base, Please try again later");
                    }
                }



            }/*else{

                //header("Location: submit-solution.php?error=returning back");
                //echo "hello";
                exit(); 
            }*/
        ?>

    </section> 
    <footer style="background: black;">
        <section>
            <p style="color: white;text-align: center;padding: 25px;">Copyrights &#169; kiranmaruhti2k21</p>
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