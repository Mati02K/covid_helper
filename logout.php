<?php
session_start();
if(isset($_POST['logout']))
{
    session_unset();
    session_destroy();
    header("Location:index.php");
}
elseif(isset($_POST['login']))
{
    header("Location:login.php");
}
else
{
    http_response_code(403);
}
?>