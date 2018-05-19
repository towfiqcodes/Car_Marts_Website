<?php
include ('config.php');

/*$sql = "SELECT parts.name, parts.price, cars.make, cars.model, cars.year, categories.name AS  'catname'
FROM parts
LEFT JOIN cars ON parts.cars_id = cars.id
LEFT JOIN categories ON parts.categories_id = categories.id
LIMIT 0 , 30";
*/
$did = $_GET["districtId"];
$sql="select * from city where city.district_id =".$did;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
	$rows = array();
	while($row = $result->fetch_assoc()) {
	    $rows[]=$row;
	}
	print json_encode($rows);
} 
?>
		