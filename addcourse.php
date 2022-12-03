<?php
	session_start();

	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");

	$coursename=@$_POST['coursename'];
	$description=@$_POST['description'];
	$date=@$_POST['date'];
	$duration=@$_POST['duration'];
	$price=@$_POST['price'];

	$sql="INSERT INTO course VALUES(null,'$coursename','$description','$date','$duration','$price')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo 'Successfully saved';
	}
	else
	{
		echo 'Error occurred';
	}
?>