
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
				<li>Add Class</li>
				<li><a href="enrollstudent.php">Enroll Student</a></li>
				<li><a href="hireprofessor.php">Hire Professor</a></li>
				<li> <div class="dropdown">
  						Professor's Dashboard
  							<div class="dropdown-content">
    							<a href="#">Teach Class</a>
    							<a href="#">Add Grades</a>
  							</div>
					</div> </li>
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