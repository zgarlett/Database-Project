<!DOCTYPE HTML>
    <html>
    <head>
      <meta charset="UTF-8">
		<title>Database Project</title>
		<link href="style.css" rel="stylesheet" type="text/css">
    </head>

<header class="main-header">
			<p class="name">The Best Group</p>
			<ul class="nav">
				<li>Search Database</li>
				<li><div class="dropdown">
  						Class
  							<div class="dropdown-content">
    							<a href="addclass.php">Add</a>
    							<a href="dropclass.php">Remove</a>
  							</div>
					</div></li>
				<li><div class="dropdown">
  						Student
  							<div class="dropdown-content">
    							<a href="enrollstudent.php">Enroll College</a>
    							<a href="inclass.php">Enroll Class</a>
								<a href="graduate.php">Graduate</a>
  							</div>
					</div></li>
				<li><div class="dropdown">
			
  						Professor
  							<div class="dropdown-content">
    							<a href="hireprofessor.php">Hire</a>
    							<a href="fireProfessor.php">Remove</a>
  							</div>
					</div></li>
				<li><div class="dropdown">
  						Professor's Dashboard
  							<div class="dropdown-content">
    							<a href="teach.php">Teach Class</a>
    							<a href="grades.php">Add Grades</a>
  							</div>
					</div></li>
				<li><a href="data.php">[+]</a></li>
			</ul>
		</header>

<?Php
		
$host_name = "localhost";  
$database = "plus2net";       
$username = "root";             
$password = "";            

$conn =  new mysqli($host_name, $username, $password, $database);
$mysqli = new mysqli($host_name,$username,$password,"Project_Schema");

if (!$conn) {
    echo "Error: Unable to connect to MySQL";
    exit;
}
		
if (!$mysqli) {
    echo "Error: Unable to connect to MySQL";
    exit;
}


@$cat=$_GET['cat']; 
if(strlen($cat) > 0 and !is_numeric($cat)){ 
echo "Data Error";
exit;
}


?>

<!doctype html>

<html>

<head>
<SCRIPT language=JavaScript>
<!--
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index.php?cat=' + val ;
}
//-->

</script>
</head>

<body >

<?Php


$query2="SELECT DISTINCT category,cat_id FROM category order by category"; 


echo "<form method=post name=f1 action='index.php'>";
	
echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
	if($stmt = $conn->query("$query2")){
		while ($row2 = $stmt->fetch_assoc()) {
		if($row2['cat_id']==@$cat)
			{echo "<option selected value='$row2[cat_id]'>$row2[category]</option>";
		} else {
			echo  "<option value='$row2[cat_id]'>$row2[category]</option>";
		}
			
	  }
		
	} else {
		echo $conn->error;
	}

echo "</select>";

echo "<select name='subcat'><option value=''>Select one</option>";
if(isset($cat) and strlen($cat) > 0){
if($stmt = $conn->prepare("SELECT DISTINCT subcategory FROM subcategory where cat_id=? order by subcategory")){
$stmt->bind_param('i',$cat);
$stmt->execute();
 $result = $stmt->get_result();
 while ($row1 = $result->fetch_assoc()) {
  echo  "<option value='$row1[subcategory]'>$row1[subcategory]</option>";
	}

}else{
 echo $conn->error;
} 


}
	
echo "</select>";
echo "<input type='text' name='like'>";

echo "<input type=submit value='Submit'></form>";

?>
<br><br>
<?php
                if ( !empty($_POST['cat']) && !empty($_POST['subcat']) ) {
					$first = $_POST['cat'];
					$second = $_POST['subcat'];
					$like = $_POST['like'];
					$query = "";
					
					switch ($first){
						//Student
						case 1:
							switch($second){
								case "Name":
									$query = "SELECT * FROM Student WHERE Name LIKE '%$like%'";
									break;
								case "Year":
									$query = "SELECT * FROM Student WHERE Year LIKE '%$like%'";
									break;
								case "All":
									$query = "SELECT * FROM Student";
									break;
							}
							break;
						//Course
						case 2:
							switch($second){
								case "Name":
									$query = "SELECT * FROM Course WHERE CourseName LIKE '%$like%' ";
									break;
								case "All":
									$query = "SELECT * FROM Course";
									break;
							}
							break;
						//Faculty
						case 3:
							switch($second){
								case "Department":
									$query = "SELECT * FROM Faculty  WHERE Department LIKE '%$like%';";
									break;
								case "Name":
									$query = "SELECT * FROM Faculty WHERE  Name LIKE '%$like%';";
									break;
								case "All":
									$query = "SELECT * FROM Faculty";
									break;
							}
							break;
						//Grade
						case 4:
							switch($second){
								case "All":
									$query = "SELECT * FROM Enrollment as e, Student as s WHERE e.SID = s.SID;";
									break;
								case "90th Percentile":
							
									$class = "SELECT DISTINCT CourseName from Course";
									
									break;
								case "Course":
									$query = "SELECT * FROM Enrollment as e, Student as s WHERE e.SID = s.SID and e.CourseName LIKE '%$like%'";
									break;
								case "Student Name":
									$query = "SELECT * FROM Enrollment as e, Student as s WHERE e.SID = s.SID and s.Name LIKE '%$like%'";
									break;
							}
							break;
					}
					
					echo "<table align = 'center'>";
					switch ($first){
						//Student
						case 1:
							echo "<tr><td><b>Student Name</b></td><td><b>Student ID</b></td><td><b>Major</b></td><td><b>Campus</b></td><td><b>Year</b></td></tr>";
							if ($resultStudents = $mysqli->query($query)){
								while($row = $resultStudents->fetch_assoc() ){
									$StudentName = $row['Name'];
									$StudentID = $row['SID'];
									$Major = $row['Major'];
									$Campus = $row['Campus'];
									$Year = $row['Year'];
									echo "<tr><td>$StudentName</td><td>$StudentID</td><td>$Major</td><td>$Campus</td><td>$Year</td></tr>";
								}
							}
							break;
						//Course
						case 2:
							echo "<tr><td><b>CourseName</b></td><td><b>Department</b></td><td><b>Time</b></td><td><b>Faculty Name</b></td><td><b>Class Type</b></td></tr>";
									if ($resultCourse = $mysqli->query($query)){
										while($rows = $resultCourse->fetch_assoc()){
										  $course = $rows['CourseName'];
										  $dept = $rows['Department'];
										  $time = $rows['Time'];
										  $faculty = $rows['FID'];
										  $classtype = $rows['Class_Type'];
										  if($faculty != ''){
										  $facultyNameQuery = $mysqli->query("Select name FROM Faculty WHERE FID = $faculty");
										  $fname = $facultyNameQuery->fetch_assoc();
										  $fnameResults = $fname['name'];
									  } else {
										  $fnameResults = 'No Professor Yet';
									  }
									echo "<tr><td>$course</td><td>$dept</td><td>$time</td><td>$fnameResults</td><td>$classtype</td></tr>";
					  					}
									}
							break;
							
						//Faculty
						case 3:
							echo "<tr><td><b>Professor Name</b></td><td><b>Department</b></td><td><b>Campus</b></td></tr>";
							if ($resultFaculty = $mysqli->query($query)){
								while($row = $resultFaculty->fetch_assoc()){
								  $name = $row['Name'];
								  $department = $row['Department'];
								  $campus = $row['Campus'];
								  echo "<tr><td>$name</td><td>$department</td><td>$campus</td></tr>";
							  }
							}
							break;
						//Grades
						case 4:
							switch($second){
								case "90th Percentile":
									echo "<tr><td><b>Student Name</b></td><td><b>Student ID</b></td><td><b>Course Name</b></td><td><b>Grade</b></td></tr>";
							
									if ($resultCourse = $mysqli->query($class)){
										while($rows = $resultCourse->fetch_assoc()){
											$courseN = $rows['CourseName'];
											
												$c = $mysqli->query("SELECT CEIL(count(SID)/10) from Enrollment WHERE CourseName = '$courseN'");
												$count = $c->fetch_assoc();
												$q = "SELECT DISTINCT * FROM Enrollment,Student WHERE CourseName = '$courseN' ORDER BY Score DESC limit " . $count['CEIL(count(SID)/10)'];
											
												if($rC = $mysqli->query($q)){
														$r = $rC->fetch_assoc();
														$SN = $r['Name'];
														$SD = $r['SID'];
														$CN = $r['CourseName'];
														$Sc = $r['Score'];
														echo "<tr><td>$SN</td><td>$SD</td><td>$CN</td><td>$Sc</td></tr>";

													
												}
										}
										
									}
									
									break;
							default:
						
							echo "<tr><td><b>Student Name</b></td><td><b>Student ID</b></td><td><b>Course Name</b></td><td><b>Grade</b></td></tr>";
							if ($resultEnrollment = $mysqli->query($query)){
								while($row = $resultEnrollment->fetch_assoc() ){
									$StudentN = $row['Name'];
									$StudentID = $row['SID'];
									$CourseN = $row['CourseName'];
									$Score = $row['Score'];
									echo "<tr><td>$StudentN</td><td>$StudentID</td><td>$CourseN</td><td>$Score</td></tr>";
								}
							}
							break;
						}
					}
					echo "</table>";
					
                    ?>
	
	
	<?php 
				}
	?>
</body>

</html>
