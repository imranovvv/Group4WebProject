<html>
<body>
<?php
 echo "<table border='1'><tr>
        <td>Customer ID</td>
        <td>Customer Name</td>
        <td>Customer Address</td>
        </tr>";
        $con=mysqli_connect("localhost", "root", "","login_db") or die("Cannot connect to server.".mysqli_error($con));
       
        $username=@$_POST["username"];
        $name=@$_POST["name"];
        $email=@$_POST["email"];

        $sql="SELECT * FROM login WHERE username LIKE '%$username%' AND name LIKE '%$name%' AND email LIKE '%$email%' ";

 $result=mysqli_query($con,$sql) or die("Cannot execute sql.");
 while($row=mysqli_fetch_array($result))
 {
 $username=$row[0];
 $name=$row[3];
 $email=$row[4];

 echo "<tr>
        <td>$username</td>
        <td>$name</td>
        <td>$email</td>
        </tr>";
 }
 echo "</table>";
?>
</body>
</html> 