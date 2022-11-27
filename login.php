<html>
<head>
<title>Untitled Document</title> </head>
<body>
<?php
	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	$username=@$_POST["username"]; 
	$password=@$_POST["password"];
	$sql="SELECT * FROM admin_table WHERE adminUsername='$username'"; $result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	echo "$rowcount";
	if(mysqli_num_rows($result)== 1)
		echo "Username does not exist";
	else
	{
		$row=mysqli_fetch_array($result,MYSQL_BOTH);
		if($row["adminPassword"]==$password)
		{
			session_start();
			$_SESSION["userid"]=$username;
			header("Location:admin.html");
		}

		else "Password wrong";
	}
?>
</body>
</html>