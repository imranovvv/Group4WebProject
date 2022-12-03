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
		<table border=1 align=center class="table table-bordered">
			<tr>
				<th colspan="6">LIST OF COURSES</th>
			</tr>
			<tr>
				<th>Course ID</th>
				<th>Course Name</th>
				<th>Description</th>
				<th>Date</th>
				<th>Duration</th>
				<th>Price</th>
			</tr>
<?php
	$con=mysqli_connect("localhost","root","","login_db") or die("Cannot connect to server");
	$query="SELECT * from course";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		?>
		<tr>
<?php
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$row[4]</td>";
		echo "<td>$row[5]</td>";

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

		<input style="margin-top: 15px;" class="btn btn-success w-100" type="submit" value="Add"></input>
		<!--Submit course-->

		</form>
  </div>
</div>
	
<?php
	}
	else
	{
		echo "No session exist or session is expired. Please log in again";
		header("Location: index.html");
		
	}

?>
	
</body>
</html>