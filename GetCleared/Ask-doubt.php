<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['username'])){

    ?>


    <!DOCTYPE html>
    <html>
    <head>
       <title>Ask a Doubt - GetCleared</title>

       <link rel="icon" href="/images/icon.png">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
       <link rel="icon" href="./images/icon.png">
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

            <section class="container text-center">
                <h2 class="text-dark display-6">You are almost there to get your solution!</h2>
                <h3 class="lead">Get cleared - Get all your doubts cleared on this platform</h3>
            </section>

            <section class="container bg-light p-3 rounded">
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

              <form method="post" action="submit-doubt.php" enctype="multipart/form-data" class="form needs-validation" novalidate>

                 <div class="form-group">
                    <h4 class="col-form-label">Roll Number</h4>
                    <input type="text" name="rollnumber" value='<?php echo $_SESSION['username'];?>' disabled class="form-control">
                </div>
                <div class="form-group">
                 <input type="text" name="section" value='<?php echo $_SESSION['section'];?>' class="form-control" hidden>
             </div>

             <!--Select Course -->
             <script type="text/javascript">

                function getCourse(){
                    var sem = document.getElementById('semister').value;
                    var course;
                    var course_code;
                    if(sem == 4){
                        course = ["Select Course","Java","Python","FLAT","Software Engineering","Computer Organisation","MEFA","COI","PCS"];
                        course_code = [0,"java","Python","FLAT","se","co","MEFA","coi","PCS"];
                    }else if(sem == 5){
                        course = ["Select Course","Database Management Systems","Computer Networks","Operating Systems","Design and Analysis of Algorithms","Unix Programming","Advanced Data Structures and Algorithms","Artificial Intelligence","Organizational Behavior","PCS - III"];
                        course_code = [0,"DBMS","CN","OS","DAA","UNIX","ADS","AI","OB","pcs3"];
                    }else if(sem == 6){
                        course = ["Select Course","Compiler Design","Data Mining","Object Oriented Analysis and Design through UML", "Cryptography & Network Security", "Software Testing Methodologies", "Internet Of Things","Technical Skills-IV ","Professional Communication Skills -IV"];
                        course_code = [0,"CD","DM","UML","CNS","STM","IOT","TS4","pcs4"];
                    }

                    var op = "";

                    for(var i=0; i<course.length;i++){
                        op+= "<option value="+course_code[i]+">"+course[i]+"</option>";
                    }

                       // console.log(course);
                       // console.log(course_code);
                       // console.log(op);
                       document.getElementById('course').innerHTML = op;
                   }

               </script>

               <div class="form-group">
                <label  class="col-form-label">Semister</label>
                <select class="form-control" name="semister" id="semister" onchange="getCourse();">
                    <option value="0">Select Semister</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>    
            <div class="form-group">
                <h4 class="col-form-label">Select Course</h4>
                <select class="form-select" name="course" required id="course">

                </select>
                <div class="invalid-feedback">
                  Select course
              </div>
          </div>
          <div class="form-group">
           <h4 class="col-form-label">Upload the Screenshot/ Photo</h4>
           <p class="col-form-label text-danger m-0 p-0    ">*To upload multiple images try converting to pdf and upload</p>
           <p class="col-form-label text-danger m-0 p-0">*File must be lessthan 2MB</p>
           <input type="File" name="file" class="form-control">
       </div>
       <div class="form-group">
           <h4 class="col-form-label">Tell something about your doubt</h4>
           <textarea rows =10 cols=50 name="doubt-text" placeholder="Sir, Can you explain me the above mentioned doubt" class="form-control"></textarea>
       </div>
       <div class="form-group">
           <input type="submit" name="submit" class="btn btn-info w-100 mt-4">
       </div>
       <div class="form-footer text-center">
        <h4 class="col-form-label">🤔🤔 I Changed my Mind 🤔🤔</h4>
        <a href="./home-student.php" class="btn-secondary btn btn-sm">Go back to home page</a>
    </div>
</form>
</section>

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



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php 
}else{

    header("Location: index.php");
    exit();
}
?>