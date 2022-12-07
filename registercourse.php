<?php
	session_start();
	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	$courseid=@$_GET['id'];
	
	$sql="INSERT INTO registercourse VALUES('{$_SESSION['userid']}','$courseid')";

	$sql_restrict="SELECT quota FROM course WHERE courseid='$courseid'";
	$result_restrict=mysqli_query($con,$sql_restrict);	
	$row=mysqli_fetch_array($result_restrict);

	$sql_count="SELECT courseid FROM registercourse WHERE courseid='$courseid'";
	$result_count=mysqli_query($con,$sql_count);
	$no_of_rows=mysqli_num_rows($result_count);

	if($no_of_rows>=$row[0])
	{
		echo "This course is already full";
	}
	else
	{
		if($result=mysqli_query($con,$sql))
		{
			echo 'Successfully saved';
			header("location:user.php");
		}
		else
		{
				echo 'Error occurred';
		}
	}
		
	?>