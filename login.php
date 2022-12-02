<?php

	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	
	$username=@$_POST["username"]; 
	$password=@$_POST["password"];
	$sql="SELECT * FROM login WHERE username='".$username."'"; 
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if(mysqli_num_rows($result)== 0)
		echo "Username does not exist";
	else
	{
		if($row["password"]==$password)
		{
			if($row["usertype"]=="admin")
			{
				session_start();
				$_SESSION["usertype"]=$row["usertype"];
				header("location:admin.php");
			}
			else
			{
				session_start();
				$_SESSION["usertype"]=$row["usertype"];
				header("location:user.php");
			}	
		}

		else echo "Password wrong";
	}
	
?>