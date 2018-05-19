<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css1/style.css">
</head>
<style>
			 th{
			 	width:80px;
			 	height: 35px;
			 	background-color:#000;
			 	color: #fff; 
			    border: 1px solid black;
			    text-align: center;
			}
			td{
				width:90px;
			 	height: 35px; 
			    border: 1px solid black;
			    text-align: center;
			}
	</style>
<body>
	<?php include('menu.php'); ?>
	<div id="main">
		<h1>Add Orders</h1>
		<form action="order.php" method="POST">
			<p>quantity</p>
			<input type="number" name="quantity">
			<?php 
				include('config.php'); 
				$sql = "SELECT * FROM users";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    echo '<p>Select users</p>';
				    echo '<select name="users">' ;
				    while($row = $result->fetch_assoc()) {
				        //echo '<option " . $row["id"]; 
		        		echo '<option value="'.$row["id"].'">'.$row["name"].
		        		'</option>';
				    }
				echo '</select>';
				} else {
				    echo "0 results";
				}
				
				$sql = "SELECT * FROM parts";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    echo '<p>Select Parts</p>';
				    echo '<select name="parts">' ;
				    while($row = $result->fetch_assoc()) {
				        //echo '<option " . $row["id"]; 
		        		echo '<option value="'.$row["id"].'">'.$row["name"].'
		        		</option>';
				    }
				echo '</select>';
				} else {
				    echo "0 results";
				}
				$conn->close();
			?>
			<br><br>
			<input type="submit" name="" value="Add">
		</form>
		<?php   
            	include('config.php'); 

		      $sql="SELECT orders.quantity, users.name AS  'Name', city.name AS  'City_name', 
		            district.name AS  'District_name', parts.name AS 'Parts_name', parts.price, cars.make, cars.model,
		            cars.year, categories.name AS  'catname' FROM orders
					LEFT JOIN users ON orders.users_id = users.id
					LEFT JOIN city ON users.cityid = city.cityid
					LEFT JOIN district ON city.district_id = district.id
					LEFT JOIN parts ON orders.parts_id = parts.id
					LEFT JOIN cars ON parts.cars_id = cars.id
					LEFT JOIN categories ON parts.categories_id = categories.id";
			
			   $result = $conn->query($sql);
			   $row =  mysqli_num_rows($result);
              echo "Total rows: " . $row;
              echo"<br>";
              echo "Show All Orders";
              
			   echo "<table>
				  <tr>
				    <th>quantity</th>
				     <th>Name</th>
                     <th>City</th>
				  	 <th>Dsitrict</th>
			         <th>Parts</th>
			         <th>Price</th>
			         <th>Model</th>
			         <th>Make</th>
			         <th>Year</th>
			         <th>Category</th>
			         <th>Action</th>
			      </tr>";
			   //echo
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        //echo '<option " . $row["id"]; 
				  echo "<tr>";
				  echo "<td>" . $row['quantity'] . "</td>";
				  echo "<td>" . $row['Name'] . "</td>";
				  echo "<td>" . $row['City_name'] . "</td>";
			      echo "<td>" . $row['District_name'] . "</td>";
			      echo "<td>" . $row['Parts_name'] . "</td>";
			      echo "<td>" . $row['price'] . "</td>";
			      echo "<td>" .$row["make"].  "</td>";
			       echo "<td>" . $row['model'] . "</td>";
			        echo "<td>" . $row['year'] . "</td>";
			         echo "<td>" . $row['catname'] . "</td>";
			         echo "<td>"."<button> edit</bttuon><button>delete</button>". "</td>";
			      echo "</tr>";
				   }
	   
					} else {
				    echo "0 results";
				}
				echo "</table>";
				$conn->close();        ?>
	</div>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(empty($_POST['cn']) && empty($_POST['bkn'])){
        echo "please enter your card number or bkash number";
     }else{
          echo"Successfully payment!";
     }
}
?>