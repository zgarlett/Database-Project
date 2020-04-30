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
				<li>Search Database</li>
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
    							<a href="teach.php">Teach Class</a>
    							<a href="grades.php">Add Grades</a>
  							</div>
					</div></li>
				<li><a href="data.php">[+]</a></li>
			</ul>
		</header>

<?Php
		
$dbhost_name = "localhost";  
$database = "plus2net";       
$username = "root";             
$password = "";            

$connection = mysqli_connect($dbhost_name, $username, $password, $database);

if (!$connection) {
    echo "Error: Unable to connect to MySQL";
    exit;
}


@$cat=$_GET['cat']; 
if(strlen($cat) > 0 and !is_numeric($cat)){ 
echo "Data Error";
exit;
}


?>

<!doctype html>

<html>

<head>
<SCRIPT language=JavaScript>
<!--
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index.php?cat=' + val ;
}
//-->

</script>
</head>

<body >

<?Php


$query2="SELECT DISTINCT category,cat_id FROM category order by category"; 


echo "<form method=post name=f1 action='index.php'>";
	
echo "<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
	if($stmt = $connection->query("$query2")){
		while ($row2 = $stmt->fetch_assoc()) {
		if($row2['cat_id']==@$cat)
			{echo "<option selected value='$row2[cat_id]'>$row2[category]</option>";
		} else {
			echo  "<option value='$row2[cat_id]'>$row2[category]</option>";
		}
			
	  }
		
	} else {
		echo $connection->error;
	}

echo "</select>";

echo "<select name='subcat'><option value=''>Select one</option>";
if(isset($cat) and strlen($cat) > 0){
if($stmt = $connection->prepare("SELECT DISTINCT subcategory FROM subcategory where cat_id=? order by subcategory")){
$stmt->bind_param('i',$cat);
$stmt->execute();
 $result = $stmt->get_result();
 while ($row1 = $result->fetch_assoc()) {
  echo  "<option value='$row1[subcategory]'>$row1[subcategory]</option>";
	}

}else{
 echo $connection->error;
} 


}else{

$query="SELECT DISTINCT subcategory FROM subcategory order by subcategory"; 

if($stmt = $connection->query("$query")){
	while ($row1 = $stmt->fetch_assoc()) {
	
echo  "<option value='$row1[subcategory]'>$row1[subcategory]</option>";

  }
}else{
echo $connection->error;
}

} 
	
echo "</select>";
echo "<input type='text' name='like'>";

echo "<input type=submit value='Submit'></form>";

?>
<br><br>
<?php
                if (!empty($_POST['like']) && !empty($_POST['cat']) && !empty($_POST['subcat']) ) {
					$first = $_POST['cat'];
					$second = $_POST['subcat'];
					$like = $_POST['like'];
					$query = "";
					
					switch ($first){
						//Student
						case 1:
							switch($second){
								case "Name":
									$query = "SELECT * FROM Student WHERE Name LIKE '%$like%';";
									break;
								case "Year":
									$query = "SELECT * FROM Student WHERE Year LIKE '%$like%';";
									break;
							}
							break;
						//Course
						case 2:
							switch($second){
								case "Name":
									$query = "SELECT * FROM Course WHERE CourseName LIKE '%$like%';";
									break;
							}
							break;
						//Faculty
						case 3:
							switch($second){
								case "Course":
									$query = "SELECT * FROM Course as c, Faculty as f WHERE c.FID = f.FID and CourseName LIKE '%$like%';";
									break;
								case "Department":
									$query = "SELECT * FROM Course as c, Faculty as f WHERE c.FID = f.FID and Department LIKE '%$like%';";
									break;
								case "Name":
									$query = "SELECT * FROM Course as c, Faculty as f WHERE c.FID = f.FID and Name LIKE '%$like%';";
									break;
							}
							break;
						//Grade
						case 4:
							switch($second){
								case "All":
									$query = "SELECT * FROM Enrollment as e, Student as s WHERE e.SID = s.SID;";
									break;
								case "90th Percentile":
									
									break;
								case "Course":
									$query = "SELECT * FROM Enrollment as e, Student as s WHERE e.SID = s.SID and CourseName = '%$like%';";
									break;
							}
							break;
					}
					
					switch ($first){
						//Student
						case 1:
							break;
						//Coure
						case 2:
							break;
						//Faculty
						case 3:
							break;
						//Grades
						case 4:
							break;
					}
					
                    ?>
	
	<?php 
				}
	?>
</body>

</html>
