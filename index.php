<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Coding Seminar Event</title>
	

	

</head>

<body>

	<a href="login.html">Login</a>

	<table border=1 align=center>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>User Type</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
		<?php
	$con=mysqli_connect("localhost","root","","login_db") or die("Cannot connect to server");
	$query="SELECT * from login";
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

	}

?>
	</table>




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>