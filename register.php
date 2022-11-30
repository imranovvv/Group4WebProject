<html>
<head>
<title>Untitled Document</title> </head>
<body>
<?php
	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	
	$name=$_POST["name"]; 
	$email=$_POST["email"];
	$username=$_POST["username"]; 
	$password=$_POST["password"];

	$sql="INSERT INTO login (name, email, username, password) VALUES(?,?,?,?)";
	$stmtinsert=$con->prepare($sql);
	$stmtinsert->bind_param('ssss',$name,$email,$username,$password);
	$result=$stmtinsert->execute();

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