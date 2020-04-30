<?php
session_start();
$course = $_SESSION['course'];
$SID = $_REQUEST['SD'];
$score = $_REQUEST['grades'];


if (!empty($course) || !empty($SID) || !empty($score)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "Project_Schema";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT SID, CourseName From Enrollment Where SID = ? and CourseName = ? Limit 1";
        $UPDATE = "UPDATE Enrollment SET Score = ? WHERE CourseName = ? and SID = ?";
        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("is", $SID, $course);
        $stmt->execute();
        $stmt->bind_result($SID, $course);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==1) {
         $stmt->close();
         $stmt = $conn->prepare($UPDATE);
         $stmt->bind_param("isi", $score, $course, $SID);
         $stmt->execute();
         echo "Record Upated sucessfully";
         echo "<script>setTimeout(\"location.href = 'grades.php';\",1500);</script>";
        } else {
         echo "Something went wrong";
         echo "<script>setTimeout(\"location.href = 'grades.php';\",1500);</script>";
        }
        $stmt->close();
        $conn->close();
       }
   } else {
    echo "All field are required";
    die();
   }
   ?>
