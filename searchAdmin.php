<?php
    session_start();
    $con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server");

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT C.*, L.* FROM login L JOIN registercourse R ON L.username=R.username JOIN course C ON C.courseid=R.courseid WHERE CONCAT(R.username,name,email,coursename,R.courseid,C.date,duration,price) LIKE '%".$valueToSearch."%'";
    $search_result = mysqli_query($con,$query);
}
 else {
        $query = "SELECT C.*, L.* FROM login L JOIN registercourse R ON L.username=R.username JOIN course C ON C.courseid=R.courseid";
    $search_result = mysqli_query($con,$query);
}



?>


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
                <?php while($row = mysqli_fetch_array($search_result)):?>
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
