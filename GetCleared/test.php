
<!--<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body id='body'>


    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-backdrop = "static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
      </div>
      <form method="post" action="#">
          <div class="modal-body">
            Show a second modal and hide this one with the button below.
            <input type="text" name="test1">
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" data-backdrop = "static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Hide this modal and show the first with the button below.
            <input type="text" name="test2">
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            <button class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
          </div>
    </form>
    </div>
  </div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./JS/bootstrap.min.js"></script>
    
   




<script type="text/javascript">
    
    $(document).ready(function(){
        //$("#exampleModalToggle").modal("show");


        $.ajax({
            type:'get',
            url:'feedback.php?user=12345',
            success: function(result){
                console.log(result);
                $('#body').html(result);
                console.log(typeof(result));
                if(result == "0"){
                    $("#exampleModalToggle").modal("show");
                    console.log("hello");
                }
            },
            error: function(error){
                //console.log(error.responseText);
            }
        });
    });


</script>








</body>
</html>-->


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

<style>
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
</style>
</head>
<body>

<!-- Trigger/Open The Modal -->
<button id="myBtn" hidden>Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" hidden>&times;</span>
    <h3 class="text-uppercase text-success text-center fw-bolder">Feedback</h3>
    <p class="fw-normal fst-italic fs-5">Hi <b>Kiran Maruthi</b>, Thankyou for being on <b>GetCleared</b>.</p>
    <p class="fw-normal fst-italic fs-6">GetCleared would love to hear from you, Please let us know your experience till now.</p>
    <form class="p-3">
      <div class="text-center">
        <label class="fw-bolder">Rate your Experience</label>
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
        <textarea class="form-control" type="text" name="name" rows="6" placeholder="Say something about your experience on GetCleared"></textarea> 
        <button class="form-control mt-2 btn-outline-success">Send Feedback</button>
      </div>
    </form>
  </div>

</div>
<script src="./feedback/checkFeedback.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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

function starRate(rateValue){
  console.log("clicked "+rateValue);

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


    $(document).ready(function(){
        //$("#exampleModalToggle").modal("show");
        //document.getElementById("myModal").style.display = "block";
        $.ajax({
            type:'get',
            url:'./feedback/feedback.php?user=123',
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

</script>

</body>
</html>








<!--Nav bar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <div class="container-fluid">
                    <div class="navbar">
                        <div style="display: block; margin: -50px;">
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>Menu
                        </button>
                </div>


                
            </nav>