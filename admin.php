<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	
</head>
<body>
<?php
	session_start();
	
	if ($_SESSION['usertype']=="admin") 
	{
?>
		<table border=1 align=center class="table table-bordered">
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
	<table align=center>
		<tr><td align="center">
			<a href="">Add data</a><br>
			<a href="">Delete user</a><br>
			<a href="">Set quota</a><br>
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