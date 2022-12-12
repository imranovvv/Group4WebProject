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
		$message = "Succesfully update the data.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>setTimeout(function () { window.location.href = 'settings.php'; }, 1000);</script>";
	}
	else
		echo "Error in updating the data";
?>