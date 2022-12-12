<?php
    session_start();

    $con=mysqli_connect("localhost", "root","","login_db") or die("Cannot connect to server.");
    //$username = $_SESSION['usermame'];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
     
    $sql="UPDATE login SET name ='$name', password = '$password', email ='$email' WHERE username = '".$_SESSION["userid"]."'";
    $result=mysqli_query($con,$sql);
    if($result)
	{
		echo "Succesfully update the data.";
		header("location:user.php");
	}
	else
		echo "Error in updating the data";
?>