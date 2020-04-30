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
								<a href="#">Graduate</a>
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
<?php
	$mysqli = new mysqli('localhost','root','','Project_Schema');
		if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
	$resultClasses = $mysqli->query("SELECT * FROM Course");
	$resultFaculty = $mysqli->query("SELECT * FROM Faculty");
		
?>
		
   <form class="form" action="attachProfessor.php" method="POST">
   <table>
		<tr><td>Courses : </td>
	   <td>
			<select name="course">
			<option selected hidden value="">Course Name</option>
		   	<?php 
				while($rows = $resultClasses->fetch_assoc()){
					$names = $rows['CourseName'];
					echo "<option value='$names'>$names</option>";
				}
				?>
		   </select>
			</td>
	   </tr>
	   <tr><td>Faculty ID : </td>
	   <td>
			<select name="FID">
			<option selected hidden value="">Professor Name</option>
		   	<?php 
				while($row = $resultFaculty->fetch_assoc()){
					$ID = $row['FID'];
					$name = $row['Name'];
					echo "<option value='$ID'>$name</option>";
				}
				?>
		   </select>
			</td>
	   </tr>
	   <tr>
        <td><input type="submit" value="Submit"></td>
       </tr>
		</table>
		</form>
    </body>
    </html>