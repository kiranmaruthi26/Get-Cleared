<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['username'])){

?>


<!DOCTYPE html>
<html>
<head>
	<title>Check your solution - GetCleared</title>
	<link rel="stylesheet" type="text/css" href="./css/style_checkSolution.css">
    <link rel="stylesheet" type="text/css" href="./css/responsivecss.css">
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
	<section>
         <header class="head-container">
            <span style="font-size:50px;cursor:pointer" onclick="openNav()" class="menubutton">&#9776;</span>
            <div class="titleSection">
                <h1 class="headTitle">GetCleared</h1>
                <h3>Hello, <?php echo $_SESSION['name'];?></h3>
            </div>
            <nav>
                <ul class="navlist">
                    <li class="menu"><a href="./home-student.php">Home</a></li>
                    <li class="menu"><a href="./Ask-doubt.php">Ask a Doubt</a></li>
                    <li class="menu"><a href="#">Solutions</a></li>                    
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="./home-student.php">Home</a>
              <a href="./Ask-doubt.php">Ask a Doubt</a>
              <a href="#">Solutions</a>
              <a href="logout.php">LOGOUT</a></li>
            </div>
        </header>
    </section>
    <section class="solution-container">
       <div >
           <h2 class="title">Checkout your Solutions here!</h2>
       </div>
        <?php 
            include "db.php";

            $roll = $_SESSION['username'];
            $sql = "SELECT * FROM student_doubt WHERE rollnumber='".$roll."'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Roll Number</th>";
                echo "<th>Course</th>";
                echo "<th>Doubt</th>";
                echo "<th>File</th>";
                echo "<th>Solution</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['rollnumber'] . "</td>";
                    echo "<td>" . $row['course'] . "</td>";
                    echo "<td>" . $row['doubt'] . "</td>";
                    echo "<td> <a href =./student_uploads/". $row['images']." target=blank>View</a></td>";
                    echo "<td class=buttonField> <form method="."get"." "."action="."view-solution.php".">";
                    echo "<input value=".$row['id']." name =Qid hidden></input>";

                    $sql_check = "SELECT * FROM faculty_solution WHERE problem_id='".$row['id']."' ";
                    $checked_result = mysqli_query($conn,$sql_check);

                    if(mysqli_num_rows($checked_result)){

                        echo "<button type=submit target=_blank class=solutionButton>Check solution</button></form></td>";
                        //echo "<button type=button class=btn btn-primary data-toggle=modal data-target=#studentRegistration data-whatever=@mdo>Student Registration</button>";
                    }else{
                        echo "<button type=submit disabled>Not yet Solved</button></form></td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                 //mysqli_free_result($result);
            }
            else{
                echo "<p class=noSolutions>You haven't asked any questions yet.</p>";
            }




        ?>
    	
    </section> 
    <footer style="background: black;">
        <section>
            <p style="color: white;text-align: center; padding: 25px;">Copyrights &#169; kiranmaruhti2k21</p>
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