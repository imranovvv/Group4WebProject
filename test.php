<?php

if(isset($_POST['search']))
{
    $con = mysqli_connect("localhost", "root", "", "login_db");
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT C.*, L.* FROM login L JOIN registercourse R ON L.username=R.username JOIN course C ON C.courseid=R.courseid WHERE CONCAT(R.username,name,email,coursename,R.courseid,C.date,duration,price) LIKE '%".$valueToSearch."%'";
    $result = mysqli_query($con, $query);    
}
 else {

}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <form action="" method="post">
            <input type="text" name="valueToSearch" placeholder=""><br><br>
            <input type="submit" name="search" value="Search"><br><br>
            
            <table border=1 align=center class="table table-bordered">
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
                <?php while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['coursename'];?></td>
                    <td><?php echo $row['courseid'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['duration'];?></td>
                    <td><?php echo $row['price'];?></td>

                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>