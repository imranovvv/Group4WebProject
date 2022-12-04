<?php
	session_start();

	$con=mysqli_connect("localhost", "root","","login_db") or die("Cannot connect to server.");
	$courseid=$_GET["id"];
	$quota=$_POST["quota"];
	$sql="UPDATE course SET quota ='$quota' WHERE courseid = '$courseid'";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		echo "Succesfully update the data.";
		header("location:admin.php");
	}
	else
		echo "Error in updating the data";

?>