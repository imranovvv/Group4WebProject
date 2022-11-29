<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css">
	<!--CSS File-->

</head>

<body>

	<div class="login">
		<h1 class="text-center">Login</h1>

		<form action="login.php" method="post" >

		<div class="form-group">
			<label class="form-label" for="username">Username</label>
			<input class="form-control" type="text" name="username" value="" required>
		</div>
		<!-- Username -->

		<div class="form-group">
			<label class="form-label" for="password">Password</label>
			<input class="form-control" type="password" name="password" value="" required>
		</div>
		<!-- Password -->
		
		<div class="form-group form-check">
			<input class="form-check-input" type="checkbox" id="check">
			<label class="form-check-label" for="check">Remember me</label>
		</div>
		<!--Remember me checkbox-->
		
		<input class="btn btn-success w-100" type="submit" value="Sign In"></input>
		<!--Submit login form-->

		</form>

		<!--Send to registration-->
		<a href="register.html">Create an account</a>
	</div>
	<!-- Login Section -->


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
</body>
</html>