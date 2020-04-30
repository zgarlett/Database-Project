<?php


session_start();

$mysqli = new mysqli('localhost','root','','Project_Schema');
		if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
$SResult = $mysqli->query("SELECT * FROM Student");
?>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet" />
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
</head>
<body>
    
    		<form id="form1" method="POST" name="search" action="removeStudent.php">
        		<table cellpadding="10" cellspacing="1" align="center">
				<tr>
                <select name="SID">
                    <option value="0" selected="selected">Select Student</option>
                        <?php
                        if (! empty($SResult)) {
                            while ($rows = $SResult->fetch_assoc()) {
                                echo '<option value="' . $rows['SID'] . '">' . $rows['Name'] . '</option>';
                            }
                        }
                        ?>
                </select><br><br>
					</tr>
                <tr><button id="Filter">Graduate</button></tr>
            
            	</table>
	</form>
                
</body>
</html>