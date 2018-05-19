<?php 
include('config.php');
$quantity=$_POST['quantity'];
$users=$_POST['users'];
$parts=$_POST['parts'];

$sql = "INSERT INTO orders(quantity,users_id,parts_id)
VALUES ('$quantity', '$users','$parts')";

if ($conn->query($sql) === TRUE) {
     echo "<script> alert('please click OK  for Payment');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>