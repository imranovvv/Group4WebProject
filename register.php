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
	$insert=$con->prepare($sql);
	$result=$insert->execute([$name,$email,$username,$password]);

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