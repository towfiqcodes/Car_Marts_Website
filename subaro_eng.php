<html>
	<head>
		<title> Subaru WRX</title>
		
		<link rel="stylesheet" type="text/css" href="style12.css">
		<style>
		select,option{display:inline;}
		</style>
    </head>
	<body> 

	<div>
		<h1 style="color: white;text-align: center;"> Subaru WRX </h1>
		
		<center>
		<img src= "image/subaru1.jpg" width="1320" height="300"  / ></center>
		
		<br>
		<div style="color: white; text-align:center;text-align:justify;">The 86 was designed around a front-mounted boxer engine, rear-wheel drive configuration, inspired by the AE86. The flat architecture of the boxer engine allows it to be mounted low, dropping the center of gravity down, resulting in sporty handling characteristics. The exterior design of the 86 delivers a slippery drag coefficient and was inspired by the Toyota 2000GT's low-to-the-ground profile and long, sleek hood.</div><br>
		
		<div style="color: white; font-size:40px; text-align:center;"> Subaru WRX Engine Parts</div><br><br>

	 	<?php
	 		include('config.php');
	 			 		
			// $sql="select parts.* from parts inner join categories on categories.id = parts.categories_id inner join cars on cars.id = parts.cars_id";
			$sql = "select parts.*,images.image_name from parts inner join categories on categories.id = parts.categories_id inner join cars on cars.id = parts.cars_id inner join images on parts.id = images.parts_id where parts.cars_id =12
			and parts.categories_id=1";

			$result = $conn->query($sql);

			if (!empty($result)) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	echo '<div style="float:left;margin-left:250px;">';
		    		echo '<input type="image" src="image/'.$row["image_name"].'" width="300" height="200" alt="Submit">';
		    		echo '<p style="color: white;">' . $row["name"]. ' <br> ' . $row["price"] . '</p>';			        
			        echo '<button><a href="registration.php">BUY</button></a>';
			        echo '</div>';
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();
	 	?>
<br>

<br>
	 	

	</body>
	
</html>