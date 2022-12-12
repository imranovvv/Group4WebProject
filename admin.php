<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <title>Admin Webpage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact - v1.1.1
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="admin.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Group4<span>.</span></h1>
      </a>
<nav id="navbar" class="navbar">
  <ul>
      <li><a href="logout.php">Logout</a>
</nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

<?php
    session_start();
    
    if (isset($_SESSION['usertype']))
    {
        if($_SESSION['usertype']=="admin"){

?>
            <!-- =======LIST OF COURSES Section ======= -->
                <section id="about" class="about">
                  <div class="container" data-aos="fade-up">
        <table border=1 align=center class="table table-bordered table-dark table-striped table-hover">
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
            <div class="section-header">
                      <h2>LIST OF COURSES</h2>

                <!-- End LIST OF COURSES Section -->
<?php
    $con=mysqli_connect("localhost","root","","login_db") or die("Cannot connect to server");
    $query="SELECT * from course";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
        ?>
        <tr>
        <td><?php echo $row['courseid']; ?></td>
        <td><?php echo $row['coursename']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['duration']; ?> hours</td>
        <td>RM<?php echo $row['price']; ?></td>
        <td><?php echo $row['quota']; ?></td>
        <td>
        <form action="editquota.php?id=<?php echo $row['courseid']?>" method="post" >
            <div class="form-group">
                <input class="form-control" type="text" name="quota" required>
            </div>
            <input style="margin-top: 15px;" class="btn btn-outline-success w-100" type="submit" value="Edit"></input>
        </form>
        </td>
        
        

<?php
    }

?>
    </tr>
    </table>

<p align="center">
  <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
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

        <input style="margin-top: 15px;" class="btn btn-dark w-100" type="submit" value="Add"></input>
        <!--Submit course-->

        </form>
  </div>
</div>
</section>
            <!-- ======= USER INFORMATION Section ======= -->
            <section id="stats-counter" class="stats-counter">
              <div class="container" data-aos="fade-up">
    <table border=1 align=center class="table table-bordered table-dark table-striped table-hover">
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
            
            <div class="section-header">
                <h2>USER INFORMATION</h2>
        <?php
    $query="SELECT * from login";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)):
        ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['usertype']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
    <?php endwhile;?>

    </table>
</section>


<?php

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
            <!-- ======= USER REGISTRATION DETAILS Section ======= -->
              <section id="stats-counter2" class="stats-counter">
                <div class="container" data-aos="fade-up">
            <table border=1 align=center class="table table-bordered table-dark table-striped table-hover">
                <tr>
                    <th colspan="9">USER REGISTRATION DETAILS</th>
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
                    <th>Delete</th>
                </tr>
            <div class="section-header">
            
            <form action="#stats-counter2" method="post">
                <h2>USER REGISTRATION DETAILS</h2>
                <input class="btn btn-secondary" type="submit" name="search" value="Search">
                <input type="text" name="valueToSearch" placeholder="">

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
                    <td>
                    <a href="delete.php?courseid=<?php echo $row['courseid']?>&amp;username=<?php echo $row['username']?>" class="btn btn-outline-danger w-100">Delete
                    </a>
                    </td>

                </tr>
                <?php endwhile;?>
            </table>
        </form>
<?php
}
}
    
    else{
        $message = "No session exist or session is expired. Please log in again";
              echo "<script type='text/javascript'>alert('$message');</script>";
    }

?>

<br><br>
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>
