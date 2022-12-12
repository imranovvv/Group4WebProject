<?php

	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	
	$username=@$_POST["username"]; 
	$password=@$_POST["password"];
	$sql="SELECT * FROM login WHERE username='".$username."'"; 
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if(mysqli_num_rows($result)== 0)
	{
		$message = "Username does not exist. Try again!";
          	echo "<script type='text/javascript'>alert('$message');</script>";
          	           echo "<script>setTimeout(function () { window.location.href = 'login.html'; }, 1000);</script>";

		
	}

	else
	{
		if($row["password"]==$password)
		{
			if($row["usertype"]=="admin")
			{
				session_start();
				$_SESSION["usertype"]=$row["usertype"];
				$_SESSION["userid"]=$row["username"];
				
				header("location:admin.php");
			}
			else
			{
				session_start();
				$_SESSION["usertype"]=$row["usertype"];
				$_SESSION["userid"]=$row["username"];

				header("location:user.php");
			}	
		}

		else 
			$message = "Wrong password. Try again!";
              		echo "<script type='text/javascript'>alert('$message');</script>";
              		echo "<script>setTimeout(function () { window.location.href = 'login.html'; }, 1000);</script>";

		
	}
	
?>
