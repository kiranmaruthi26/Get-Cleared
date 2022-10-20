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
    <title>Home - GetCleared</title>

    <!--Feedback pop style-->
    <style type="text/css">
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .profile_pic{
        width: 10%;
        height: 20%;
    }
    .profile_pic img{
        width: 70%;
    }


</style>
</head>
<body>
    <!-- feedback-->
    <section>
        <!-- Trigger/Open The Modal -->
        <button id="myBtn" hidden>Open Modal</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <span class="close" hidden>&times;</span>
             <!--Loader -->
            <div class="text-center d-none" id="loader_send">
                <img src="./images/loader.gif">
                <p class="fw-light">Please hold, Feedback is being saved...</p>
            </div>
            <!-- Success Spin-->
            <div class="svg-container text-center p-2 d-none" id="success">    
                <svg class="ft-green-tick" xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 48 48" aria-hidden="true">
                <circle class="circle" fill="#5bb543" cx="24" cy="24" r="22"/>
                <path class="tick" fill="none" stroke="#FFF" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M14 27l5.917 4.917L34 17"/>
                </svg>
                <p className="fw-normal">Thank You😀<br/>Your Feedback has been saved...</p>
                <p className="fw-normal">*** Keep SUpporting Us ***</p>
            </div>
            <div id="feedbackdivision">
            <h3 class="text-uppercase text-success text-center fw-bolder">Feedback</h3>
            <p class="fw-normal fst-italic fs-5">Hi <b><?php echo $_SESSION['fname'] ?></b>, Thankyou for being on <b>GetCleared</b>.</p>
            <p class="fw-normal fst-italic fs-6">GetCleared would love to hear from you, Please let us know your experience till now.</p>
            <form class="p-3" action="#" id="feebackForm">
              <div class="text-center">
                <input type="text" name="username" value="<?php echo $_SESSION['faculty_id']?>" id="user" hidden>
                <label class="fw-bolder" >Rate your Experience</label>
                <p class="fs-6 text-danger mb-0 fw-bolder" style="display:none;" id="error_star">Please rate your Experience</p>
                <div>
                  <a class="fs-1 text-decoration-none btn btn star p-1" style="cursor:pointer" id="star-1" onclick="starRate(1)">&starf;</a>
                  <a class="fs-1 text-decoration-none btn btn star p-1" style="cursor:pointer" id="star-2" onclick="starRate(2)">&starf;</a>
                  <a class="fs-1 text-decoration-none btn btn star p-1" style="cursor:pointer" id="star-3" onclick="starRate(3)">&starf;</a>
                  <a class="fs-1 text-decoration-none btn btn star p-1" style="cursor:pointer" id="star-4" onclick="starRate(4)">&starf;</a>
                  <a class="fs-1 text-decoration-none btn btn star p-1" style="cursor:pointer" id="star-5" onclick="starRate(5)">&starf;</a>
                </div>
              </div>
              <div>
                <label class="form-group fw-bolder">Suggestion/ Opinion/ feedback</label>
                <textarea class="form-control" type="text" name="name" id="feedbackText" rows="6" placeholder="Say something about your experience on GetCleared"></textarea> 
                <button class="form-control mt-2 btn-outline-success" id="sendFeedback">Send Feedback</button>
              </div>
            </form>
          </div>

        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">
            // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        /*window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }*/

        var rate =0;
        function starRate(rateValue){
          console.log("clicked "+rateValue);
          rate = rateValue;
          if(rateValue == 1){
            document.getElementById("star-1").style.color="gold";
            document.getElementById("star-2").style.color="";
            document.getElementById("star-3").style.color="";
            document.getElementById("star-4").style.color="";
            document.getElementById("star-5").style.color="";
          }
          else if(rateValue == 2){
            document.getElementById("star-1").style.color="gold";
            document.getElementById("star-2").style.color="gold";
            document.getElementById("star-3").style.color="";
            document.getElementById("star-4").style.color="";
            document.getElementById("star-5").style.color="";
          }
          else if(rateValue == 3){
            document.getElementById("star-1").style.color="gold";
            document.getElementById("star-2").style.color="gold";
            document.getElementById("star-3").style.color="gold";
            document.getElementById("star-4").style.color="";
            document.getElementById("star-5").style.color="";
          }
          else if(rateValue == 4){
            document.getElementById("star-1").style.color="gold";
            document.getElementById("star-2").style.color="gold";
            document.getElementById("star-3").style.color="gold";
            document.getElementById("star-4").style.color="gold";
            document.getElementById("star-5").style.color="";
          }
          else if(rateValue == 5){
            document.getElementById("star-1").style.color="gold";
            document.getElementById("star-2").style.color="gold";
            document.getElementById("star-3").style.color="gold";
            document.getElementById("star-4").style.color="gold";
            document.getElementById("star-5").style.color="gold";
          }
        }

            //checking if submitted or not and pop
            $(document).ready(function(){
                //$("#exampleModalToggle").modal("show");
                //document.getElementById("myModal").style.display = "block";
                var username = document.getElementById("user").value;
                rate =0;
                console.log(username);
                $.ajax({
                    type:'get',
                    url:'./feedback/checkFeedback.php?user='+username,
                    success: function(result){
                        console.log(result);
                        console.log(typeof(result));
                        if(result == "0"){
                            document.getElementById("myModal").style.display = "block";
                            console.log("feedback poped");
                        }else{
                          console.log("feedback given");
                        }
                    },
                    error: function(error){
                        console.log("error");
                    }
                });
            });




            //Submit feedback
            $("#sendFeedback").click(function (event) {
                console.log("Ajax called")
                event.preventDefault();
                //console.log(rate);
                var feedback = document.getElementById('feedbackText').value.trim();
                //console.log(feedback);
                if(rate === 0){
                    document.getElementById('error_star').style.display = "";
                }
                else if(feedback == ""){
                    document.getElementById("feedbackText").style.border = "2px solid red";
                    document.getElementById('error_star').style.display = "none";
                }else{
                    document.getElementById("feedbackText").style.border = "";
                    document.getElementById('error_star').style.display = "";
                    var username = document.getElementById('user').value;
                    document.getElementById("feedbackdivision").style.display = "none";
                    document.getElementById('loader_send').classList.remove("d-none");
                    $.ajax({
                        type:'POST',
                        url:'./feedback/submitFeedback.php',
                        data: { user:username, feedback:feedback, rating:rate },
                        dataType:'json',
                        success : function(result){
                            console.log("feedback sent");
                            document.getElementById('loader_send').classList.add("d-none");
                            document.getElementById("success").classList.remove("d-none");
                            //console.log("result : "+result);
                            setTimeout(function(){
                                document.getElementById("success").classList.add("d-none");
                                modal.style.display = "none";
                            },3000);

                        },
                        error : function(error){
                            //console.log(error.responseText);
                            console.log(error);
                        }

                    });
                }
              
            });



        </script>



    </section>
    <header class="bg-light d-flex">
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


        <?php 
            include "db.php";

            $course = $_SESSION['course'];
            $section = $_SESSION['section'];
            $sql = "SELECT * FROM student_doubt WHERE course='".$course."' AND status='unsolved' AND section='".$section."'";
            $result = mysqli_query($conn, $sql);
            $count_unsolved = 0;

        ?>
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
                                <li>Schedule Live session</li>
                                <li>Assig Assignments</li>
                            </ul>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./liveSessions/courseModule">Open Module</a>
                            </div>
                        </div>
                    </div>
                
                <div class="col mt-3">
                    <?php 
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    if($row['status'] == "unsolved"){
                                        $count_unsolved = $count_unsolved+1;
                                        //echo $count_unsolved;
                                    }
                                }
                            }

                        ?>
                    <div class="card  border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/solved-question.jpg" alt=LogoImage class="card-image-top rounded" style="height:220px;">
                        <div class="card-body">
                            <?php if($count_unsolved>0){?>

                            <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Problems Yet to solve : <?php echo $count_unsolved;?></h5>
                        <?php }else{?>
                            <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Hurry You have solved everything</h5>

                            <?php }?>
                        </div>
                            <p class="card-text text-center text-warning"></p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./solve-problem">Solve Problem</a>
                            </div>
                        </div>
                    </div>


                    <div class="col mt-3">
                    <div class="card border-secondary p-3 shadow-lg" style="width:22rem;">
                        <img src="./images/check-solutions.png" alt=LogoImage class="card-image-top" style="height:220px;">
                        <div class="card-body">   
                         <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Check Solved Problems</h5>
                        </div>
                            <p class="card-text text-center text-warning"></p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./solved-problems">Check</a>
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
                        <img src="./images/material.jpg" alt=LogoImage class="card-image-top" style="height:220px;">
                        <div class="card-body">   
                         <h5 class="card-title text-center text-primary fw-bold fs-6 text-uppercase">Materials</h5>
                        </div>
                            <p class="card-text text-center text-info">Get Materials for all Units of all Courses</p>
                            <div class="text-center">
                                    <a class="btn btn-primary text-center" href="./materials/viewmaterials">Get Materials</a>
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


        <section class="container-fluid mt-5">
            <h3 class="fs-6">Check Registered students - <a href="./students_registered">Click here</a></h3>
            <h3 class="fs-6">To change the password of your students login - <a href="./changeStudent_password">Click here</a></h3>
        </section>

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


       <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}else{

    header("Location: index");
    exit();
}
?>  