<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['course'])){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_solve.css">
    <link rel="stylesheet" type="text/css" href="./css/responsivecss.css">
    <title>Solved Problems - GetCleared</title>
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
                <h3>Hello, <?php echo $_SESSION['fname'];?></h3>
            </div>
            <nav>
                <ul class="navlist">
                    <li class="menu"><a href="./home-faculty.php">Home</a></li>
                    <li class="menu"><a href="./solve-problem.php">New Problem</a></li>
                    <li class="menu"><a href="#">Solved Problems</a></li>                    
                    <li> <a href="logout.php" class="logout">LOGOUT</a></li>

                </ul>  
            </nav>
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="./home-faculty.php">Home</a>
              <a href="./solve-problem.php">New Problem</a>
              <a href="#">Solved Problems</a>
              <a href="logout.php">LOGOUT</a></li>
            </div>
        </header>
    </section> 

    <section class="main-container">
        <section>
            <h2 class="title">Here are the questions you have solved!</h2>
        </section>
         <?php 
            include "db.php";

            $course = $_SESSION['course'];
            $sql = "SELECT * FROM faculty_solution WHERE faculty_id='".$_SESSION['faculty_id']."' ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                echo "<tr>";
                echo "<th>Soleved Problem Id</th>";
                echo "<th>Roll Number</th>";
                echo "<th>Solution</th>";
                echo "<th>File</th>";
                echo "<th>Submitted On</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    //$_SESSION['Qid'] = $row['id'];
                    echo "<tr>";
                    echo "<td>". $row['problem_id'] ."</td>";
                    echo "<td>" . $row['rollnumber'] . "</td>";
                    echo "<td>" . $row['solution'] . "</td>";
                    echo "<td> <a href =./faculty_uploads/". $row['image']." target=blank>View</a></td>";
                    echo "<td>".$row['datetime']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                 mysqli_free_result($result);
            }
            else{
                echo "You haven't solved any questions.";
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