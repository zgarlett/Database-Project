<?php

$FID = $_POST['FID'];



if (!empty($FID)) {
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
     $INSERT = "DELETE FROM Faculty Where FID = ?";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $FID);
     $stmt->execute();
     $stmt->bind_result($FID);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum>0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("i", $FID);
      $stmt->execute();
      echo "Record deleted sucessfully";
      echo "<script>setTimeout(\"location.href = 'fireProfessor.php';\",2500);</script>";
     } else {
      echo "No such record";
      echo "<script>setTimeout(\"location.href = 'fireProfessor.php';\",2500);</script>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
