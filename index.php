<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Important Meta Tags -->
    <title>Covid -19 Online Helper</title>
    <meta name="description" content="Covid 19 Online Helper helps you to find the people who require Oxygen,plasma for treatment of covid Around India.">
    <meta name="keywords" content="Covid-19, Oxygen, Plasma">
    <meta name="author" content="Quasar Tech Solutions">
    <meta name="robots" content="index,follow">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Css -->
    <link href="assets/css/home.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/faviicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/faviicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/faviicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/faviicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/faviicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/faviicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/faviicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/faviicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/faviicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/faviicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/faviicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/faviicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/faviicon/favicon-16x16.png">
    <link rel="manifest" href="assets/faviicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/faviicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="#" class="navbar-brand">
            <img src="logo.jpg" height="70" alt="Quasar Logo">
        </a>
      
        <p class="heading">Covid Help Care</p>
        &emsp;
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="https://www.quasartechsolutions.in/" target="_blank"  class="nav-item nav-link">About Us </a>
                <a href="https://www.mohfw.gov.in/" target="_blank" class="nav-item nav-link">Covid Info </a>
                <a href="postneeds.php" class="nav-item nav-link">Post Needs</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
            </div>
            <div class="navbar-nav ml-auto">
            <form action="logout.php" method="post" >
              <?php 

                if(isset($_SESSION['uname']))
                {
                    echo "<button type='submit' name='logout' class='btn btn-primary'>LogOut</button>" ;
                }
                else
                {
                    echo "<button type='submit' name='login' class='btn btn-primary'>Login</button>" ;
                }
               
                ?>
                
            </form>
            </div>
    </nav>


    
<div class="container">
        <div class="row">
           <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">

<?php 
        require("config.php");
         
        $sql = "SELECT * FROM covid_requirement ORDER BY sno DESC LIMIT 10";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0)
        {

        while($row=mysqli_fetch_assoc($result))
        {
        // Retrieve Values From Database
        $requirement=$row['p_require'];
        $city=$row['p_city'];
        $brief=$row['p_brief'];
        $cno=$row['p_cno'];
        $u_date=$row['r_date'];

        // Display the retrieved Values

        echo "
         <div class='card text-center'>
              <div class='card-header'>
                Requirement Needed  - $requirement
              </div>
           <div class='card-body'>
            <h5 class='card-title'>Location: $city</h5>
            <p class='card-text'>$brief</p>
            <a href='tel:$cno' class='btn btn-primary'>Call And Help</a>
            </div>
            <div class='card-footer text-muted'>
            Posted on $u_date
            </div>
        </div>
        <br>
        ";
        }
    }

?>

            </div>
            </div>
            </div>


 <!-- Copyright -->
 <footer class="page-footer font-small blue pt-4">
        <div class="footer-copyright text-center py-3">&#169; 2021 Copyright:
          <a href="https://www.quasartechsolutions.in/">Quasar Tech Solutions</a>
        </div>
      </footer>
        <!-- Copyright -->
      
        <script src="assets/vendor/jquery/jquery.min.js"></script>   
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>