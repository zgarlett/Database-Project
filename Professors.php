
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
				<li><a href="enrollstudent.php">Enroll Student</a></li>
				<li><a href="hireprofessor.php">Hire Professor</a></li>
				<li>Professors Dashboard</li>
			</ul>
		</header>
     <form class="form" action="insert.php" method="POST">
      <table>
       <tr>
        <td>Professor :</td>
        <td><input type="text" name="username" required></td>
       </tr>
       <tr>
        <td>CWID :</td>
        <td><input type="cwid" name="cwid" required></td>
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