<?php
	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	
	$name=$_POST["name"]; 
	$email=$_POST["email"];
	$username=$_POST["username"]; 
	$password=$_POST["password"];
	$password2=$_POST['password2'];

	if($password!=$password2){
		$message = "Password is not equal";
        echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>setTimeout(function () { window.location.href = 'register.html'; }, 1000);</script>";
	}
	else{

	$sql="INSERT INTO login (name, email, username, password) VALUES(?,?,?,?)";
	$stmtinsert=$con->prepare($sql);
	$stmtinsert->bind_param('ssss',$name,$email,$username,$password);
	$result=$stmtinsert->execute();

	if($result){
		$message = "Successfully saved";
        echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>setTimeout(function () { window.location.href = 'login.html'; }, 1000);</script>";
	}
	else
	{
		echo 'Error occurred';
	}
}
?>