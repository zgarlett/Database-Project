<?php
$name = $_POST['name'];
$SID = $_POST['SID'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$major = $_POST['major'];
$campus = $_POST['campus'];
$year = $_POST['year'];

if (!empty($name) || !empty($SID) || !empty($email) || !empty($phone) || !empty($major) || !empty($campus) || !empty($year)) {
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
     $INSERT = "INSERT Into Student (SID, Name, Email, Phone, Major, Campus, Year) values(?, ?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $SID);
     $stmt->execute();
     $stmt->bind_result($SID);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("issssss", $SID, $name, $email, $phone, $major, $campus, $year);
      $stmt->execute();
      echo "New record inserted sucessfully";
      echo "<script>setTimeout(\"location.href = 'enrollstudent.php';\",2500);</script>";
     } else {
      echo "Someone already registered using this SID";
      echo "<script>setTimeout(\"location.href = 'enrollstudent.php';\",2500);</script>";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
