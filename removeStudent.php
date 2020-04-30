<?php

$SID = $_POST['SID'];

if (!empty($SID)) {
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
     $INSERT = "DELETE FROM Student WHERE SID = ?";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $SID);
     $stmt->execute();
     $stmt->bind_result($SID);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum>0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("i", $SID);
      $stmt->execute();
      echo "Student Graduated sucessfully";
      echo "<script>setTimeout(\"location.href = 'graduate.php';\",2500);</script>";
     } else {
      echo "No Such Student";
      echo "<script>setTimeout(\"location.href = 'graduate.php';\",2500);</script>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
