<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
	<!--CSS File-->
</head>
<body>
<?php
	session_start();
	
	if ($_SESSION['usertype']=="admin") 
	{
?>

	<a href="logout.php">Logout</a>

		<table border=1 align=center class="table table-bordered">
			<tr>
				<th colspan="8">LIST OF COURSES</th>
			</tr>
			<tr>
				<th>Course ID</th>
				<th>Course Name</th>
				<th>Description</th>
				<th>Date</th>
				<th>Duration</th>
				<th>Price</th>
				<th>Quota</th>
				<th>Set Quota</th>
			</tr>
<?php
	$con=mysqli_connect("localhost","root","","login_db") or die("Cannot connect to server");
	$query="SELECT * from course";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		?>
		<tr>
		<td><?php echo $row["0"]; ?></td>
		<td><?php echo $row["1"]; ?></td>
		<td><?php echo $row["2"]; ?></td>
		<td><?php echo $row["3"]; ?></td>
		<td><?php echo $row["4"]; ?></td>
		<td><?php echo $row["5"]; ?></td>
		<td><?php echo $row["6"]; ?></td>
		<td>
		<form action="editquota.php?id=<?php echo $row[0]?>" method="post" >
			<div class="form-group">
				<input class="form-control" type="text" name="quota" required>
			</div>
			<input style="margin-top: 15px;" class="btn btn-success w-100" type="submit" value="Edit"></input>
		</form>
		</td>
		

<?php
	}

?>
	</tr>
	</table>

<p>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Add course 
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   <form action="addcourse.php" method="post" >

		<div class="form-group">
			<label class="form-label" for="coursename">Course Name</label>
			<input class="form-control" type="text" name="coursename" required>
		</div>
		<!-- Course name -->

		<div class="form-group">
			<label class="form-label" for="description">Description</label>
			<textarea class="form-control" name="description" rows="5" cols="60"></textarea>
		</div>
		<!-- Description -->

		<div class="form-group">
			<label class="form-label" for="date" >Date</label>
		    <input class="form-control" type="date" name="date">
		</div>
		<!-- Date -->
		
		<label class="form-label" for="duration">Duration</label>
		<div class="input-group">
			<input class="form-control " type="text" name="duration" required>
			<span class="input-group-text">hours</span>
		</div>
		<!-- Duration -->

		<label class="form-label" for="price">Price</label>
		<div class="input-group">
			<span class="input-group-text">RM</span>
			<input class="form-control " type="text" name="price" required>
		</div>

		<label class="form-label" for="quota">Quota</label>
		<div class="input-group">
			<input class="form-control " type="text" name="quota" required>
		</div>
		<!-- Duration -->

		<input style="margin-top: 15px;" class="btn btn-success w-100" type="submit" value="Add"></input>
		<!--Submit course-->

		</form>
  </div>
</div>

	<table border=1 align=center class="table table-bordered">
		<tr>
			<th colspan="5">USER INFORMATION</th>
		</tr>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>User Type</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
		<?php
	$query="SELECT * from login";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result)):
		?>
		<tr>
			<td><?php echo $row["0"]; ?></td>
			<td><?php echo $row["1"]; ?></td>
			<td><?php echo $row["2"]; ?></td>
			<td><?php echo $row["3"]; ?></td>
			<td><?php echo $row["4"]; ?></td>
		</tr>
    <?php endwhile;?>

	</table>


<a href="test.php">USER REGISTRATION</a>

<?php
}
	
	else
	{
		echo "No session exist or session is expired. Please log in again";
		
	}

?>
	
</body>
</html>