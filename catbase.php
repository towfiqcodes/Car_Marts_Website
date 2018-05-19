<?php 
include('config.php');
$name=$_POST['name'];


$sql = "INSERT INTO categories (name) VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>