<!DOCTYPE html>
<html>
<head>
    <title>GetCleared</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="./css/style_index.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="./images/icon.png">
</head>
<body style="background-image:url('./images/login_bg.jpg');">
    <div class="maincontainer bgdiv">
    </div>
    <div class="container-fluid text-center mt-5 ">
        <section class="border rounded-3 container p-5 bg-light bg-gradient">
        <form  action="login.php" method="post">
            <div class="text-uppercase  text-info fw-bolder"><h1>Get Cleared</h1></div>
            <div class="fst-italic text-uppercase text-dark">
                <h3>Login</h3>
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
            <section class="form-group">
                <div class="">
                    <input type="text" placeholder="Username" name="username" class="form-control">
                </div>
                <div class="mt-3">
                    <input type="password" placeholder="Password" name="password" class="form-control">
                </div>
                <div class="form-footer">
                    <input type="submit" value="Login" class="btn btn-info mt-3 w-100">
                </div>
            </section>
            <div class="form-footer">
                <h6 class="w-100"><a href="./forgotpassword.php">Forgot Password ?</a></h6>
            </div>

                <div class="form-footer text-center">
                    <h6>Don't have account ?</h6>
                    <button type="button" class="btn btn-info m-3" data-toggle="modal" data-target="#studentRegistration" data-whatever="@mdo">Student Registration</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#facultyRegistration" data-whatever="@mdo">Faculty Registration</button>
                    <h6 class="mt-3">For technical Support, contact</h6>
                    <a href="mailto: support@getcleared">support@getcleared.in</a>
                </div>
        </form>
        
    </section>
    </div>
    <!-- Student registration-->
    <section class="popup">
     <div class="modal fade" id="studentRegistration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop = "static" data-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Student Registration from</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="register_student.php" method="post">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name</label>
                <input type="text" class="form-control" id="recipient-name" name="name" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Roll Number</label>
                <p class="info" style="color:blue; font-size: 10px;">Your Roll Number will be the username while login</p>
                <input type="text" class="form-control" id="recipient-rollnumber" name="rollnumber" required>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Phone Number</label>
                <input type="tel" class="form-control" id="recipient-phonenumber" name="phonenumber" required pattern="[6-9]{1}[0-9]{9}">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">E-mail</label>
                <input type="email" class="form-control" id="recipient-email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <!--<div class="form-group">
                <label for="message-text" class="col-form-label">Select your Section</label>
                <input type="radio" class="form-control" id="recipient-section" name="section" value ="A" required checked><lable>A Section</lable>
                <input type="radio" class="form-control" id="recipient-section" name="section" value ="B" required><lable>B Section</lable>
                <input type="radio" class="form-control" id="recipient-section" name="section" value ="C" required><lable>C Section</lable>
                <input type="radio" class="form-control" id="recipient-section" name="section" value ="D" required><lable>D Section</lable>
                <input type="radio" class="form-control" id="recipient-section" name="section" value ="CST" required><lable>CST</lable>
            </div>-->
            <div class="form-group">
                <label for="message-text" class="col-form-label">Select your Section (Currently Accepting only IV SEM CSE&CST Only)</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="section" id="exampleRadios1" value="A" checked>
              <label class="form-check-label" for="exampleRadios1">
                A Section
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="section" id="exampleRadios2" value="B">
              <label class="form-check-label" for="exampleRadios2">
                B Section
              </label>
              </div>
              
              <div class="form-check">
              <input class="form-check-input" type="radio" name="section" id="exampleRadios3" value="C">
              <label class="form-check-label" for="exampleRadios3">
                C Section
              </label>
            </div>
            
            <div class="form-check">
              <input class="form-check-input" type="radio" name="section" id="exampleRadios4" value="D">
              <label class="form-check-label" for="exampleRadios4">
                D Section
              </label>
            </div>
            
            <div class="form-check">
              <input class="form-check-input" type="radio" name="section" id="exampleRadios5" value="CST">
              <label class="form-check-label" for="exampleRadios5">
                CST
              </label>
            </div>
            
            <div class="form-group">
                <label for="message-text" class="col-form-label">Password</label>
                <input type="password" class="form-control" id="recipient-password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                <p class="info" style="color:red; font-size:10px;">*Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</p>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Confirm Password</label>
                <input type="password" class="form-control" id="recipient-cpassword" name="cpassword" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
</div>
</section>


<!--Faculty registration -->

<section class="popup">
 <div class="modal fade" id="facultyRegistration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop = "static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Faculty Registration from</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form action="register_faculty.php" method="post">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="recipient-Fname" name="fname" required>
        </div>
        <div class="form-group">
            <label for="message-text" class="col-form-label">Biometric ID</label>
            <p class="info" style="color:blue; font-size:10px;">Your Biometric id will be the username while login</p>
            <input type="text" class="form-control" id="recipient-Fid" name="f_id" required pattern="[0-9]{}">
        </div>
        <div class="form-group">
            <lable for="message-text" class="col-form-label">Course your handling (Currently Accepting only IV SEM CSE&CST Only)</lable>
            <select class="form-control" name="course">
                <option value="selectCourse">Select course</option>
                <option value="java">Java</option>
                <option value="Python">Python</option>
                <option value="CO">Computer Organisation</option>
                <option value="flat">FLAT</option>
            </select>
        </div>
        <div class="form-group">
            <label for="message-text" class="col-form-label">Phone Number</label>
            <p style="margin-bottom:0;font-size:10px;color:blue;">Must be a vaild Indian phone number</p>
            <input type="tel" class="form-control" id="recipient-fphonenumber" name="fphonenumber" required pattern="[6-9]{1}[0-9]{9}">
        </div>
        <div class="form-group">
            <label for="message-text" class="col-form-label">E-mail</label>
            <input type="email" class="form-control" id="recipient-femail" name="femail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        </div>
        <div class="form-group">
                <label for="message-text" class="col-form-label">Select section your dealing with (Currently Accepting only IV SEM CSE&CST Only)</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="section" id="fexampleRadios1" value="A&B" checked>
              <label class="form-check-label" for="exampleRadios1">
                A and B Sections
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="section" id="fexampleRadios2" value="C&D&CST">
              <label class="form-check-label" for="exampleRadios2">
                C, D and CST  Section
              </label>
              </div>
        <div class="form-group">
            <label for="message-text" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="recipient-Fpassword" name="fpassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            <p class="info" style="color:red; font-size:10px;">*Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</p>
        </div>
        <div class="form-group">
            <label for="message-text" class="col-form-label">Confirm Password</label>
            <input type="password" class="form-control" id="recipient-cfpassword" name="fcpassword" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
</div>
</div>
</section>
<script type="text/javascript" src="./JS/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>