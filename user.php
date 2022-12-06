<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User main page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	
	<!--CSS File-->
</head>
<body>
<?php
	session_start();

	if ($_SESSION['usertype']=="user") 
	{
		$con=mysqli_connect("localhost","root","","login_db") or die("Cannot connect to server");
		$query="SELECT * from course ";
		$result=mysqli_query($con,$query);
?>
	<a href="logout.php">Logout</a>
	<a href="settings.html">Settings</a>

<?php 
		while($row=mysqli_fetch_array($result)):
?>



<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row[1]?></h5>
    <p class="card-text"><?php echo $row[2]?></p>

		<a href="registercourse.php?id=<?php echo $row[0]?>" class="btn btn-primary">Register</a>	

  </div>
</div>


<?php
endwhile;
}

	else
	{
		echo "No session exist or session is expired. Please log in again";
		
	}

?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>