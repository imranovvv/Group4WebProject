<html>
<head>
<title>Untitled Document</title> </head>
<body>
<?php
	session_start();

	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	$courseid=@$_GET['id'];
	echo $courseid;
	$sql="INSERT INTO registercourse VALUES('{$_SESSION['userid']}','$courseid')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo 'Successfully saved';
	}
	else
	{
		echo 'Error occurred';
	}
?>
</body>
</html>