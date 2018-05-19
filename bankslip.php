<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "","cardatabase");
// Selecting Database
$db = mysql_select_db("cardatabase", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select name from users where name='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['name'];
if(!isset($login_session)){
mysql_close($connection);
header('Location:users.php'); // Redirecting To Home Page
}
?>
<?php
session_start(); 
if (isset($_POST['submit'])) {
	$username=$_POST['name'];
    $password=$_POST['password'];
		$connection = mysql_connect("localhost", "root", "","cardatabase");
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		$db = mysql_select_db("cardatabase", $connection);
		$query = mysql_query("select * from users where password='$password' AND name='$username'", $connection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			$row = mysql_fetch_assoc($query);
			if($row["admin"]==1)
				header("location:admin.php"); // Redirecting To Other Page
			else
				header("location:users.php"); // Redirecting To Other Page
		} else {
		$error = "Username or Password is invalid";
		}
		mysql_close($connection); // Closing Connection
	
}