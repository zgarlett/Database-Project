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
				<li><a href="index.php">Search Database</a></li>
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
		<body>
<?php
	$mysqli = new mysqli('localhost','root','','Project_Schema');
		if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
	$resultClasses = $mysqli->query("SELECT * FROM Course");
	$resultStudents = $mysqli->query("SELECT * FROM Student");
	$resultProfessors = $mysqli->query("SELECT * FROM Faculty");
		
?>
		
      <table align="center">
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
				  if($faculty != ''){
				  $facultyNameQuery = $mysqli->query("Select name FROM Faculty WHERE FID = $faculty");
				  $fname = $facultyNameQuery->fetch_assoc();
				  $fnameResults = $fname['name'];
				  } else {
					  $fnameResults = 'No Professor Yet';
				  }
				  echo "<tr><td>$course</td><td>$dept</td><td>$time</td><td>$fnameResults</td><td>$classtype</td></tr>";
			  }
			  ?>
			  </td>
		  </tr>
		  </table>
		<br>
		  <table align="center">
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
		  <table align="center">
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