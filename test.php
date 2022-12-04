<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM course WHERE CONCAT(`courseid`, `coursename`, `description`, `date`,`duration`,`price`,`quota`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM course";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "login_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="test.php" method="post">
            <input type="text" name="valueToSearch" placeholder=""><br><br>
            <input type="submit" name="search" value="Search"><br><br>
            
            <table>
                <tr>
                    <th>Course ID</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Quota</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['0'];?></td>
                    <td><?php echo $row['1'];?></td>
                    <td><?php echo $row['2'];?></td>
                    <td><?php echo $row['3'];?></td>
                    <td><?php echo $row['4'];?></td>
                    <td><?php echo $row['5'];?></td>
                    <td><?php echo $row['6'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>