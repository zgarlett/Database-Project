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
	$resultClasses2 = $mysqli->query("SELECT * FROM Course");
	$resultsStudent = $mysqli->query("SELECT * FROM Student");
		
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
				  if($faculty != ''){
				  $facultyNameQuery = $mysqli->query("Select name FROM Faculty WHERE FID = $faculty");
				  $fname = $facultyNameQuery->fetch_assoc();
				  $fnameResults = $fname['name'];
				  } else {
					  $fnameResults = 'No Professor Yet';
				  }
				  $classtype = $rows['Class_Type'];
				  echo "<tr><td>$course</td><td>$dept</td><td>$time</td><td>$fnameResults</td><td>$classtype</td></tr>";
			  }
			  ?>
			  </td>
		  </tr>
		  </table>
		<br>
		<form class="form" action="attachStudent.php" method="POST">
		<table align="center">
			<tr><td>Courses : </td>
	   <td>
			<select name="course">
			<option selected hidden value="">Course Name</option>
		   	<?php 
				while($row = $resultClasses2->fetch_assoc()){
					$names = $row['CourseName'];
					echo "<option value='$names'>$names</option>";
				}
				?>
		   </select>
			</td>
				<td>Student ID : </td>
				<td><select name="SID">
						<option selected hidden value="">Student Name</option>
						<?php 
							while($row = $resultsStudent->fetch_assoc()){
								$ID = $row['SID'];
								$names = $row['Name'];
								echo "<option value='$ID'>$names</option>";
							}
							?>
					   </select></td>
				<td><button type="submit" name="Submit">Submit</button></td>
	   </tr>
			</table>
		  
     </form>
    </body>
    </html>