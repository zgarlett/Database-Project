
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
				<<li><a href="index.php">Search Database</a></li>
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
     <form class="form" action="insertClass.php" method="POST">
      <table>
       <tr>
        <td>Course Name :</td>
        <td><input type="text" name="coursename" required></td>
       </tr>
       <tr>
        <td>Department :</td>
        <td><input type="text" name="department" required></td>
       </tr>
       <tr>
        <td>Time :</td>
        <td><input type="time" name="time" required></td>
       </tr> 
		  <tr>
        <td>Class Type :</td>
        <td>
			<select name="class_type" required>
          		<option selected hidden value="">Select Type</option>
          		<option value="Lecture">Lecture</option>
          		<option value="Online">Online</option></td>
       </tr> 
		  
       <tr>
        
       </tr>
       <tr>
        <td><input type="submit" value="Submit"></td>
       </tr>
      </table>
     </form>
    </body>
    </html>