<?php


session_start();

$mysqli = new mysqli('localhost','root','','Project_Schema');
		if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
$CourseResult = $mysqli->query("SELECT * FROM Course");
$CourseResult2 = $mysqli->query("SELECT * FROM Course");
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
</head>
<body>
    
    		<form id="form1" method="POST" name="search" action="grades.php">
        		<table cellpadding="10" cellspacing="1" align="center">
				<tr>
                <select name="Course">
                    <option value="0" selected="selected">Select Course</option>
                        <?php
                        if (! empty($CourseResult)) {
                            while ($rows = $CourseResult->fetch_assoc()) {
                                echo '<option value="' . $rows['CourseName'] . '">' . $rows['CourseName'] . '</option>';
                            }
                        }
                        ?>
                </select><br><br>
					</tr>
                <tr><button id="Filter">Search</button></tr>
            
            	</table>
	</form>
                <?php
                if (! empty($_POST['Course'])) {
                    ?>
                    <table cellpadding="10" cellspacing="1" align="center">

               
                    <tr>
						<th><strong>Name</strong></th>
                        <th><strong>SID</strong></th>
                        <th><strong>CourseName</strong></th>
                        <th><strong>Grade</strong></th>
                    </tr>
                
                <?php
                    
                    
                    $courseSelect = $_POST['Course'];
					$array = array();
                    $query = "SELECT * from Enrollment WHERE CourseName = '$courseSelect' ;";
                    
                    $result = $mysqli->query($query);
                }
                if (! empty($result)) {
					echo "<form ";
                    while ($row = $result->fetch_assoc()) {
						$names = $row['SID'];
						$namequery = $mysqli->query("SELECT Name FROM Student WHERE SID = ' $names ' ;");
						$namesfound = $namequery->fetch_assoc();
						array_push($array, $row['SID']);
                        ?>
                <tr>
						<td><div class="col" id="user_data_0"><?php echo $namesfound['Name']; ?></div></td>
                        <td><div class="col" id="user_data_1"><?php echo $row['SID']; ?></div></td>
                        <td><div class="col" id="user_data_2"><?php echo $row['CourseName']; ?> </div></td>
                        <td><div class="col" id="user_data_3"><?php echo $row['Score']; ?> </div></td>
						
                    </tr>
                <?php
                    }
                    ?>
                    
                
            </table>
	</form>
            <?php
                }
                ?>  
		<?php
                if (! empty($_POST['Course'])) {
					
                    ?>
			<form action="updateGrades.php" method="post" name="enter">
                    <table cellpadding="10" cellspacing="1" align="center">

                
                    <tr>
                        <td><strong>SID</strong></td>
                        <th><strong>CourseName</strong></td>
                        <td><strong>Grade</strong></td>
                    </tr>
                
                
		
		<tr>
			<td>
				<select name="SD">
					<option value="0" selected="selected" hidden="true">Select SID</option>
						<?php 
						
				foreach ($array as $value){ 
					echo "<option value='$value'>$value</option>";
				}
					?>
				</select></td>
				
			<td><?php echo $courseSelect; ?></td>
			
			<td><input name="grades"></td></tr>
				
			<tr><td><button type="submit">Submit</button></td>
			</tr>
		
		
					<?php
					
					$_SESSION['course'] = $courseSelect;
					
                }
                ?>
	</table>
        </div>
    </form>
</body>
</html>