
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
     <form class="form" action="insertProfessor.php" method="POST">
      <table>
       <tr>
        <td>Name :</td>
        <td><input type="text" name="name" required></td>
       </tr>
       <tr>
        <td>Faculty ID :</td>
        <td><input type="FID" name="FID" required></td>
       </tr>
       <tr>
        <td>Email :</td>
        <td><input type="email" name="email" required></td>
       </tr> 
	   <tr>
		  <td>Department :</td>
		   <td>
		   	<input name="department" required>
		   </td>
		</tr>
		  <tr>
		  	<td>Date of Birth :</td>
			  <td><input type="date" name="date_of_birth" required></td>
		  </tr>
		  <tr>
			  <td>Primary Campus :</td>
			  <td>
			  	<select name="campus" required>
          		<option selected hidden value="">Select Campus</option>
          		<option value="Stillwater">Stillwater</option>
          		<option value="Tulsa">Tulsa</option>
         		</select>
			  </td>
		  </tr>
		  <tr>
		  <td>Education Level :</td>
		   <td>
		   	<input name="education" required>
		   </td>
		</tr>
		  <tr>
		  <td>Field of Study :</td>
		   <td>
		   	<input name="field_of_study" required>
		   </td>
		</tr>
       <tr>
        <td><input type="submit" value="Submit"></td>
       </tr>
      </table>
      
     </form>
    </body>
    </html>