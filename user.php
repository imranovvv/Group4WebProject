<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>USER PAGE</h1>
<?php
	session_start();

	if ($_SESSION['usertype']=="user") 
	{
		
	}
	
	else
	{
		echo "No session exist or session is expired. Please log in again";
		header("Location: index.html");
		exit();
	}

?>
</body>
</html>