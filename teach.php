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
				<li><a href="addclass.php">Add Class</a></li>
				<li><div class="dropdown">
  						Enroll Student
  							<div class="dropdown-content">
    							<a href="enrollstudent.php">In College</a>
    							<a href="inclass.php">In Class</a>
  							</div>
					</div></li>
				<li><a href="hireprofessor.php">Hire Professor</a></li>
				<li><div class="dropdown">
  						Professor's Dashboard
  							<div class="dropdown-content">
    							<a href="#">Teach Class</a>
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
	   <tr><td>Faculty ID : </td><td><input name="FID"></td></tr>
	   <tr>
        <td><input type="submit" value="Submit"></td>
       </tr>
		</table>
		</form>
    </body>
    </html>