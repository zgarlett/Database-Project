    <!DOCTYPE HTML>
    <html>
    <head>
      <meta charset="UTF-8">
		<title>Database Project</title>
		<link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<header class="main-header">
			<p class="name">The Best Group</p>
			<ul class="nav">
				<li>Search Database</li>
				<li><a href="addclass.php">Add Class</a></li>
				<li><a href="enrollstudent.php">Enroll Student</a></li>
				<li><a href="hireprofessor.php">Hire Professor</a></li>
				<li><div class="dropdown">
  						Professor's Dashboard
  							<div class="dropdown-content">
    							<a href="teach.php">Teach Class</a>
    							<a href="grades.php">Add Grades</a>
  							</div>
					</div></li>
			</ul>
		</header>
<?php
	$mysqli = new mysqli('localhost','root','','Project_Schema');
		if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
	$resultClasses = $mysqli->query("SELECT * FROM Course");
	$resultStudents = $mysqli->query("SELECT * FROM Student");
	$resultProfessors = $mysqli->query("SELECT * FROM Faculty");
		
?>
		
      <table>
       <tr>
		   <td><b>CoursName</b></td><td><b>Department</b></td><td><b>Time</b></td><td><b>Faculty ID</b></td><td><b>Class Type</b></td>
		  </tr>
		  <tr>
		  <td>
			  <?php 
			  while($rows = $resultClasses->fetch_assoc()){
				  $course = $rows['CourseName'];
				  $dept = $rows['Department'];
				  $time = $rows['Time'];
				  $faculty = $rows['FID'];
				  $classtype = $rows['Class_Type'];
				  echo "<tr><td>$course</td><td>$dept</td><td>$time</td><td>$faculty</td><td>$classtype</td></tr>";
			  }
			  ?>
			  </td>
		  </tr>
		  </table>
		<br>
		  <table>
		  <tr><td><b>Student Name</b></td><td><b>Student ID</b></td><td><b>Major</b></td><td><b>Campus</b></td><td><b>Year</b></td></tr>
		  <tr>
		  <td>
			  <?php 
			  while($row = $resultStudents->fetch_assoc()){
				  $name = $row['Name'];
				  $SID = $row['SID'];
				  $major = $row['Major'];
				  $campus = $row['Campus'];
				  $year = $row['Year'];
				  echo "<tr><td>$name</td><td>$SID</td><td>$major</td><td>$campus</td><td>$year</td></tr>";
			  }
			  ?>
			  </td>
		  </tr>
		  </table>
		<br>
		  <table>
		  <tr><td><b>Professor Name</b></td><td><b>Department</b></td><td><b>Campus</b></td></tr>
		  <tr>
		  <td>
			  <?php 
			  while($row = $resultProfessors->fetch_assoc()){
				  $name = $row['Name'];
				  $department = $row['Department'];
				  $campus = $row['Campus'];
				  echo "<tr><td>$name</td><td>$department</td><td>$campus</td></tr>";
			  }
			  ?>
			  </td>
		  </tr>
      </table>
     </form>
    </body>
    </html>