<html>
<body>
<?php
session_start();

$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server.".mysqli_error($con));
$courseid=$_GET["id"];
$username=$_GET["username"];

$sql_delete="DELETE FROM registercourse WHERE courseid='$id' AND username= '$username'  ";
$sql_result=mysqli_query($con,$sql_delete) or die("Error in sql due to ".mysql_error());
if($sql_result)
 echo "Succesfully deleted.";
 else
 echo "Error in deleting the data”;
?>
</body>
</html> 