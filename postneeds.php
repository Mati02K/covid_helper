<?php 

session_start();

function phpAlert($msg)
{
  echo '<script type="text/javascript"> alert("'.$msg.'")</script>';
}

if(isset($_SESSION['uname']))
{
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
          <div class="col-sm-10 col-md-9 col-lg-9 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <img src="logo.jpg" class="img-responsive center-block d-block mx-auto" height="160" width="150" alt="Logo">  
                <center><h3>Post Your Requirements Related to COVID-19</h3></center>
                
                <form id="userform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post"  autocomplete="off">
                  <div class="form-group">
                    <label for="Name">Enter Required Person Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" autofocus required>
                  </div>

                  <div class="form-group">
                    <label for="Mobile Number">Enter Required Person Contact Number</label>
                    <input type="tel" class="form-control" id="mno" name="mno" placeholder="XXXXXXXXXX" pattern="[0-9]{10}" required>
                  </div>

                  

                  <div class="form-group">
                    <label for="Batch">Select Your City</label>
                    <select class="form-control" id="city" name="city" required>
                    <option value="">Select the City</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Bhopal">Bhopal</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="Batch">Select Your Requirement</label>
                    <select class="form-control" id="requirement" name="requirement" required>
                    <option value="">Select the Requirement</option>
                    <option value="Oxygen Cylinder">Oxygen Cylinder</option>
                    <option value="Plasma Donor">Plasma Donor</option>
                    <option value="Money">Money</option>
                    <option value="Food">Food</option>
                    </select>
                  </div>

                    <div class="form-group">
                      <label for="brief">Brief Your Requirement</label>
                      <textarea class="form-control" id="brief" name="brief" rows="3" required></textarea>
                    </div>
                         
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Post and Save Lives...</button>
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
</body>
</html>

<?php

require("config.php");

date_default_timezone_set('Asia/Kolkata');

$info = getdate();
 
$date = $info['mday'];

if(strlen($date)==1)
{
    $date="0".$date;
}

$month= $info['mon'];

if(strlen($month)==1)
{
    $month="0".$month;
}

$year= $info['year'];

$update_date="$date-$month-$year";

// Get the Details From the USer
if(isset($_POST['submit']))
{
    $name= trim($_POST['name']);
    $mno= trim($_POST['mno']);
    $city= trim($_POST['city']);
    $requirement= trim($_POST['requirement']);
    $brief= trim($_POST['brief']);


    // Remove HTML unsafe Characters
    $name=htmlspecialchars(strip_tags($name));
    $mno=htmlspecialchars(strip_tags($mno));
    $city=htmlspecialchars(strip_tags($city));
    $requirement=htmlspecialchars(strip_tags($requirement));
    $brief=htmlspecialchars(strip_tags($brief));

    // SQL Injection - Remove unsafe MYSQL Elements
     
    $name = mysqli_real_escape_string($conn,$name);
    $mno = mysqli_real_escape_string($conn,$mno);
    $city = mysqli_real_escape_string($conn,$city);
    $requirement = mysqli_real_escape_string($conn,$requirement);
    $brief = mysqli_real_escape_string($conn,$brief);


    $count=0;


    if(strlen($name)>2)
    {
      $count=$count+1;
    }
    else
    {
      echo "<script>window.alert('Enter Proper Name')</script>";
    }

    if(strlen($brief)>10)
    {
      $count=$count+1;
    }
    else
    {
      echo "<script>window.alert('Enter Proper Brief')</script>";
    }
    
    $upload_mail= $_SESSION['uname'];

    if($count==2)
    {
    $query = "INSERT INTO covid_requirement(p_name,p_cno,p_city,p_require,p_brief,r_date,upload_by)
              VALUES('$name','$mno','$city','$requirement','$brief','$update_date','$upload_mail')";
    
    $result=mysqli_query($conn,$query);//Boolean value

    if($result)
    {
        echo "<script>window.alert('Success')</script>";
        echo "<script>location.replace('index.php')</script>;";
    }
    else
    {
        echo "Error".$query."<br>".mysqli_error($conn);
    }
   mysqli_close($conn);
  }
  

}

}

else
{
  phpAlert("Please login to use this feature...");
  echo "<script>location.replace('login.php')</script>;";
}
?>