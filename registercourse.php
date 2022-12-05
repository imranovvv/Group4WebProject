<?php
	session_start();

	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	$courseid=@$_GET['id'];
	$sql="INSERT INTO registercourse VALUES('{$_SESSION['userid']}','$courseid')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo 'Successfully saved';
		header("Location:user.php");
	}
	else
	{
		echo 'Error occurred';
	}
?>