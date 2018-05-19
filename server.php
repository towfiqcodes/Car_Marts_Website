<?php
include("db.php");

if(isset($_REQUEST["city"])){

	$sql="select * from city where cityid >= '".$_REQUEST["city"]."%'";
	
	$a=getDataFromDB($sql);
	
	foreach($a as $v){
		
		echo "<p>".$v["Name"]."</p>";
		

	}
}
?>