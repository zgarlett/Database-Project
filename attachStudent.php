<?php
$course = $_POST['course'];
$SID = $_POST['SID'];

if (!empty($course) || !empty($FID)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "Project_Schema";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {

        $SELECT = "SELECT SID From Student Where SID = ? Limit 1";
        $INSERT = "INSERT INTO Enrollment (SID, CourseName) values(?, ?)";
        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $SID);
        $stmt->execute();
        $stmt->bind_result($SID);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==1) {
         $stmt->close();
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("is", $SID, $course);
         $stmt->execute();
         echo "Record Upated sucessfully";
         echo "<script>setTimeout(\"location.href = 'inclass.php';\",2500);</script>";
        } else {
         echo "Student doesn't exist!";
         echo "<script>setTimeout(\"location.href = 'inclass.php';\",2500);</script>";
        }
        $stmt->close();
        $conn->close();
       }
   } else {
    echo "All field are required";
    die();
   }
   ?>
