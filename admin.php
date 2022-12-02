<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>ADMIN PAGE</h1>
<?php
	session_start();
	
	if ($_SESSION['usertype']=="admin") 
	{
?>
		<table border=1 align=center>
			<tr>
				<th colspan="6">COURSES</th>
			</tr>
			<tr>
				<th>Course ID</th>
				<th>Course Name</th>
				<th>Description</th>
				<th>Date and time</th>
				<th>Duration</th>
				<th>Price</th>
			</tr>
<?php
	$con=mysqli_connect("localhost","root","","login_db") or die("Cannot connect to server");
	$query="SELECT * from course";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		?>
		<tr>
<?php
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";

	}

?>
	</tr>
	</table>
<?php
	}
	else
	{
		echo "No session exist or session is expired. Please log in again";
		header("Location: index.html");
		
	}

?>

</body>
</html>