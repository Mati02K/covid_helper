<?php
//  $num1=$_GET['num1'];
//  $num2=$_GET['num2'];

//  $answer= $num1+$num2;

//  echo "<h1>".$answer."</h1>";
session_start();
$cookie_name = "yourname";
if(!isset($_COOKIE[$cookie_name]))
{
    echo "Cookie Named".$cookie_name."is not set";
}
else
{
    echo "Cookie".$cookie_name."is set <br>";
    echo "Value is ".$_COOKIE[$cookie_name]."<br>";
}

if(!isset($_SESSION[$cookie_name]))
{
    echo "Session Named ".$_SESSION[$cookie_name]." is not set";
}
else
{
    echo "Session ".$cookie_name." is set <br>";
    echo "Value is ".$_SESSION[$cookie_name]."<br>";
}
?>