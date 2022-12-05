<?php
    session_start();

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