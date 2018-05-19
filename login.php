<?php
session_start(); 
if (isset($_POST['submit'])) {
	$username=$_POST['name'];
    $password=$_POST['password'];
    $error = "Both fields are required.";

		$connection = mysql_connect("localhost", "root", "","cardatabase");
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		$db = mysql_select_db("cardatabase", $connection);
		$query = mysql_query("select * from users where password='$password' AND name='$username'", $connection);
		$count = mysql_num_rows($query);
		
		
		if ($count == 1) {
			$_SESSION['name']=$username; // Initializing Session
			$row = mysql_fetch_assoc($query);
			if($row["admin"]==1)
				header("location:admin.php"); // Redirecting To Other Page
			else
				header("location:users.php"); // Redirecting To Other Page
		}
		else{
			echo $error;
       }
		mysql_close($connection); // Closing Connection
	
}