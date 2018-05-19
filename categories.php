<html>
<head>
	<title>Categories</title>
<style>
			 th{
			 	width:150px;
			 	height: 35px;
			 	background-color:#000;
			 	color: #fff; 
			 	text-align: center;
			    border: 1px solid black;
			}
			td{
				width:150px;
			 	height: 35px; 
			    border: 1px solid black;
			    text-align: center;
			}
	</style>
	<link rel="stylesheet" type="text/css" href="css1/style.css">
</head>
<body>
	<?php include('menu.php'); ?>
	<div id="main">
		<h1>Add Car Categories</h1>
		<form action="catbase.php" method="POST">
			<p>Name</p>
			<input type="text" name="name">
			<br><br>
			<input type="submit" name="" value="Add">
		</form>

      <br>
		<?php   
            	include('config.php'); 

		      $sql="select * from categories";
			   $result = $conn->query($sql);
			   $row =  mysqli_num_rows($result);
              echo "Total rows: " . $row;
              echo"<br>";
              echo "Show the all category";
			   
			   echo "<table>
				  <tr>
			         <th>Name</th>
			         <th>Action</th>
			      </tr>";
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        //echo '<option " . $row["id"]; 
				  echo "<tr>";
			      echo "<td>" . $row['name'] . "</td>";
			       echo "<td>"."<button> edit</bttuon><button>delete</button>". "</td>";
			      echo "</tr>";
				   }
	   
					} else {
				    echo "0 results";
				}
				echo "</table>";
				$conn->close();
			?>
	</div>

</body>
</html>

