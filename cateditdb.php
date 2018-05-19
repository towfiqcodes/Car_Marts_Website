<?php

include 'config.php';

$sql = "UPDATE categories  WHERE name.id SET name ";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

