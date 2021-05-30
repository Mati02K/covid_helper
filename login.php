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
    <link href="assets/css/style.css" rel="stylesheet">
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
    
    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <img src="logo.jpg" class="img-responsive center-block d-block mx-auto" height="160" width="150" alt="Logo">
                <h5 class="card-title text-center">Covid-19 Online Helper</h5>

                <form class="form-signin" action=""  method="post"  autocomplete="off">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                  </div>
    
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
                    </div>

                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
                  <hr class="my-4">
                  <center><a href="signup.php">New User!!! Sign up Here...</a></center> 
                </form>
              </div>
            </div>
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
        
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
  require('config.php');

  $email= trim($_POST['email']);
  $pass= trim($_POST['pass']);

  // Remove HTML unsafe Characters
  $email=htmlspecialchars(strip_tags($email));
  $pass=htmlspecialchars(strip_tags($pass));  

  // SQL Injection - Remove unsafe MYSQL Elements
     
  $email = mysqli_real_escape_string($conn,$email);
  $pass = mysqli_real_escape_string($conn,$pass);

  $query = "SELECT * FROM user_details WHERE u_email='$email' AND u_pass='$pass'";

  $result=mysqli_query($conn,$query);

  $rows=mysqli_fetch_array($result);

  if($rows['u_email']==$email && $rows['u_pass']==$pass)
  {
    $_SESSION['uname']=$email;
    echo "<script>window.alert('Correct')</script>";
    echo "<script>location.replace('index.php')</script>;";
  }
  else
  {
    echo "<script>window.alert('Enter Correct Credentials')</script>";
  }
  mysqli_close($conn);

}

?>