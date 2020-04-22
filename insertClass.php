<?php
$coursename = $_POST['coursename'];
$department = $_POST['department'];
$time = $_POST['time'];
$class_type = $_POST['class_type'];
if (!empty($coursename) || !empty($department) || !empty($time) || !empty($class_type)) {
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
     $INSERT = "INSERT Into Course (CourseName, Department, Time, Class_Type) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $coursename);
     $stmt->execute();
     $stmt->bind_result($coursename);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $coursename, $department, $time, $class_type);
      $stmt->execute();
      echo "New record inserted sucessfully";
      echo "<script>setTimeout(\"location.href = 'addclass.php';\",2500);</script>";
     } else {
      echo "Already registered using this Course";
      echo "<script>setTimeout(\"location.href = 'addclass.php';\",2500);</script>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
