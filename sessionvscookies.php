<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Vs Cookie</title>
</head>
<body>
    <form action="" method="post">
      <label for="num1">Enter Your Name</label>
      <input type="text" name="name" ><br>
      <button name="cookie" type="submit">Add Cookie</button><br>
      <button name="session" type="submit">Add Session</button><br>
      <button name="deletecookie" type="submit">Delete Cookie</button><br>
      <button name="deletesession" type="submit">Delete Session</button><br>
   
    </form>
</body>
</html>

<?php
session_start();
// Setting the Cookie
if(isset($_POST['cookie']))
{
    $name=$_POST['name'];
    $cookie_name = "yourname";
    $cookie_value= $name;
    // 86400 seconds = 1 day , 86400 * 30
    setcookie($cookie_name,$cookie_value,time() + (86400 * 30),"/");
    echo "<script>location.replace('add.php')</script>";
}
// Setting the session
if(isset($_POST['session']))
{
    $name=$_POST['name'];
    $_SESSION["yourname"] = $name;
    echo "<script>location.replace('add.php')</script>";
}
// Delete the cookie
if(isset($_POST['deletecookie']))
{
    setcookie("yourname","",time() - 3600,"/");
    echo "<script>location.replace('add.php')</script>";
}
// Deleting the Session
if(isset($_POST['deletesession']))
{
    // remove all session  variables
    session_unset();

    // Destroy the session
    session_destroy();
    
    echo "<script>location.replace('add.php')</script>";
}


?>