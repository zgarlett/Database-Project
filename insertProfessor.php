<?php
$name = $_POST['name'];
$FID = $_POST['FID'];
$email = $_POST['email'];
$department = $_POST['department'];
$campus = $_POST['campus'];
$education = $_POST['education'];
$field_of_study = $_POST['field_of_study'];


if (!empty($name) || !empty($FID) || !empty($email) || !empty($department) || !empty($campus) || !empty($education) || !empty($field_of_study)) {
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
     $INSERT = "INSERT Into Faculty (FID, Name, Email, Department, Campus, Education_Level, Field_of_Study) values(?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $FID);
     $stmt->execute();
     $stmt->bind_result($FID);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("issssss", $FID, $name, $email, $department, $campus, $education, $field_of_study);
      $stmt->execute();
      echo "New record inserted sucessfully";
      echo "<script>setTimeout(\"location.href = 'hireprofessor.php';\",2500);</script>";
     } else {
      echo "Someone already registered using this SID";
      echo "<script>setTimeout(\"location.href = 'hireprofessor.php';\",2500);</script>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
