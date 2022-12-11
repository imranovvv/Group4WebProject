<?php
	session_start();
	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	$courseid=@$_GET['id'];
	$username=$_SESSION['userid'];

	$sql="INSERT INTO registercourse VALUES('$username','$courseid')";

	$sql_restrict="SELECT quota FROM course WHERE courseid='$courseid'";
	$result_restrict=mysqli_query($con,$sql_restrict);	
	$row=mysqli_fetch_array($result_restrict);

	$sql_count="SELECT courseid FROM registercourse WHERE courseid='$courseid'";
	$result_count=mysqli_query($con,$sql_count);
	$no_of_rows=mysqli_num_rows($result_count);
	$row2=mysqli_fetch_array($result_count);

	$sql_duplicate="SELECT * FROM registercourse WHERE username = '$username' AND courseId ='$courseid'";
	$result_duplicate=mysqli_query($con,$sql_duplicate);
	if(mysqli_num_rows($result_duplicate)>0){
		 $message = "You have already registered for this course";
                  	echo "<script type='text/javascript'>alert('$message');</script>";
                  	echo "<script>setTimeout(function () { window.location.href = 'user.php'; }, 1000);</script>";

	}
	if($no_of_rows>=$row[0])
	{
		   $message = "This course is already full";
           echo "<script type='text/javascript'>alert('$message');</script>";
           echo "<script>setTimeout(function () { window.location.href = 'user.php'; }, 1000);</script>";

	}
	else
	{
		if($result=mysqli_query($con,$sql))
		{
		    $message = "Successfully saved";
                  	echo "<script type='text/javascript'>alert('$message');</script>";
                  	echo "<script>setTimeout(function () { window.location.href = 'user.php'; }, 1000);</script>";

		}
		else
		{
			$message = "Error occurred";
                  		echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
		
	?>
