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
                <p class="fw-normal fst-italic fs-5">Hi <b><?php echo $_SESSION['name'] ?></b>, Thankyou for being on <b>GetCleared</b>.</p>
                <p class="fw-normal fst-italic fs-6">GetCleared would love to hear from you, Please let us know your experience till now.</p>
                <form class="p-3" action="#" id="feebackForm">
                  <div class="text-center">
                    <input type="text" name="username" value="<?php echo $_SESSION['username']?>" id="user" hidden>
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