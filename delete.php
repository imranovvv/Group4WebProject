<html>
<body>
<?php
session_start();

$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server.".mysqli_error($con));
$courseid=$_GET["courseid"];
$username=$_GET["username"];

$sql_delete="DELETE FROM registercourse WHERE courseid='$courseid' AND username= '$username'";
$sql_result=mysqli_query($con,$sql_delete);
if($sql_result)
{
    echo "Succesfully deleted.";
    header("location:admin.php");
}
else{
    $message = "Problem occured!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?> 

</body>
</html> 