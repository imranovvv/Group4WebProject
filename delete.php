<html>
<body>
<?php
session_start();

$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server.".mysqli_error($con));
$courseid=$_GET["courseid"];
$username=$_GET["username"];

<<<<<<< Updated upstream
$sql_delete="DELETE FROM registercourse WHERE courseid='$courseid' AND username= '$username'";
$sql_result=mysqli_query($con,$sql_delete);
if($sql_result)
{
    echo "Succesfully deleted.";
    header("location:admin.php#stats-counter2");
}
else{
    $message = "Problem occured!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?> 

=======

if (isset($_POST['delete']))
{
	$courseid=$_GET["id"];
	$username=$_GET["username"];
	
	$query = "DELETE FROM registercourse WHERE courseid='$id' AND username= '$username' ";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run)
	{
		echo'<script> alert("DATA DELETED"); </script>';
		header ("location: admin.php");
	}
	else
	{
		echo '<script> alert ("DATA Not Deleted"); </script>';
	}

?>
>>>>>>> Stashed changes
</body>
</html> 