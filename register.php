<?php
	$con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");
	
	$name=$_POST["name"]; 
	$email=$_POST["email"];
	$username=$_POST["username"]; 
	$password=$_POST["password"];
	$password2=$_POST['password2'];

	if($password!=$password2){
		echo "Password is not equal";
	}
	else{

	$sql="INSERT INTO login (name, email, username, password) VALUES(?,?,?,?)";
	$stmtinsert=$con->prepare($sql);
	$stmtinsert->bind_param('ssss',$name,$email,$username,$password);
	$result=$stmtinsert->execute();

	if($result){
		echo 'Successfully saved';
		header("location:user.php");
	}
	else
	{
		echo 'Error occurred';
	}
}
?>