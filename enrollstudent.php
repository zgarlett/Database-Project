
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
    							<a href="incollege.php">In College</a>
    							<a href="inclass.php">In Class</a>
  							</div>
					</div></li>
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
     <form class="form" action="insertStudent.php" method="POST">
      <table>
       <tr>
        <td>Name :</td>
        <td><input type="text" name="name" required></td>
       </tr>
       <tr>
        <td>Student ID :</td>
        <td><input type="SID" name="SID" required></td>
       </tr>
       <tr>
        <td>Email :</td>
        <td><input type="email" name="email" required></td>
       </tr> 
       <tr>
        <td>Phone no :</td>
        <td>
         
         <input type="phone" name="phone" required>
        </td>
       </tr>
	   <tr>
		  <td>Major :</td>
		   <td>
		   	<input name="major" required>
		   </td>
		</tr>
		  <tr>
		  	<td>Date of Birth :</td>
			  <td><input type="date" name="dateOfBirth" required></td>
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
			  <td>Year :</td>
			  <td>
			  	<select name="year" required>
          		<option selected hidden value="">Select Year</option>
          		<option value="Freshman">Freshman</option>
          		<option value="Sophmore">Sophmore</option>
				<option value="Junior">Junior</option>
          		<option value="Senior">Senior</option>
				<option	value="Other">Other</option>
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