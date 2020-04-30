<?php
$coursename = $_POST['coursename'];

if (!empty($coursename)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "Project_Schema";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT CourseName From Course Where CourseName = ? Limit 1";
     $INSERT = "DELETE FROM Course WHERE CourseName = ?";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $coursename);
     $stmt->execute();
     $stmt->bind_result($coursename);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum>0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("s", $coursename);
      $stmt->execute();
      echo "Deleted Record Sucessfully";
      echo "<script>setTimeout(\"location.href = 'dropclass.php';\",2500);</script>";
     } else {
      echo "No Such Course";
      echo "<script>setTimeout(\"location.href = 'dropclass.php';\",2500);</script>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
