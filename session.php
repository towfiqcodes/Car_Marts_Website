<?php

$connection = mysql_connect("localhost", "root", "","cardatabase");
$db = mysql_select_db("cardatabase", $connection);

session_start();// Starting Session

$user_check=$_SESSION['name'];
$ses_sql=mysql_query("select name from users where name='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['name'];
if(!isset($login_session)){
    mysql_close($connection);
    header('Location:users.php'); // Redirecting To Home Page
}
?>