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

	if (isset($_SESSION['usertype'])) 
	{
        if($_SESSION['usertype']=="user"){
        $username=$_SESSION['userid'];
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

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT C.*, L.* FROM login L JOIN registercourse R ON L.username=R.username JOIN course C ON C.courseid=R.courseid WHERE R.username='$username'AND CONCAT(R.username,name,email,coursename,R.courseid,C.date,duration,price) LIKE '%".$valueToSearch."%'";
    $search_result = mysqli_query($con,$query);
}
 else {
        $query = "SELECT C.*, L.* FROM login L JOIN registercourse R ON L.username=R.username JOIN course C ON C.courseid=R.courseid WHERE R.username='$username'";
    $search_result = mysqli_query($con,$query);
}

?>

<form action="" method="post">
            <input type="text" name="valueToSearch" placeholder=""><br><br>
            <input type="submit" name="search" value="Search"><br><br>
            
            <table border=1 align=center class="table table-bordered">
            	<tr>
            		<th colspan="8">Your Registered Courses</th>
            	</tr>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course Name</th>
                    <th>Course ID</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Price</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['coursename'];?></td>
                    <td><?php echo $row['courseid'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['duration'];?> hours</td>
                    <td>RM<?php echo $row['price'];?></td>

                </tr>
                <?php endwhile;?>
            </table>
        </form>
<?php
}
}

	else
	{
		echo "No session exist or session is expired. Please log in again";

		
	}

?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>