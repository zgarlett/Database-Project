<?php
$course = $_POST['course'];
$FID = $_POST['FID'];

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
        $SELECT = "SELECT FID From Faculty Where FID = ? Limit 1";
        $UPDATE = "UPDATE Course SET FID = ? WHERE CourseName = ?";
        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $FID);
        $stmt->execute();
        $stmt->bind_result($FID);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==1) {
         $stmt->close();
         $stmt = $conn->prepare($UPDATE);
         $stmt->bind_param("is", $FID, $course);
         $stmt->execute();
         echo "Record Upated sucessfully";
         echo "<script>setTimeout(\"location.href = 'teach.php';\",2500);</script>";
        } else {
         echo "Something went wrong";
         echo "<script>setTimeout(\"location.href = 'teach.php';\",2500);</script>";
        }
        $stmt->close();
        $conn->close();
       }
   } else {
    echo "All field are required";
    die();
   }
   ?>
