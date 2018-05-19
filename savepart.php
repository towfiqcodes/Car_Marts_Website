<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardatabase";

$name=$_POST['name'];
$price=$_POST['price'];
$car=$_POST['car'];
$cat=$_POST['category'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO parts(name,price,cars_id,categories_id)
VALUES ('$name', '$price','$car','$cat')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;

    $target = "image/";
    $target = $target . basename( $_FILES['uploaded']['name']) ;
    $ok=1;
    $types = array('image/jpeg', 'image/gif','image/png');

    if (in_array($_FILES['uploaded']['type'], $types)) {
    // file is okay continue
    } else {
    $ok=0;
    } 
    if ($ok==0){
    	echo "Sorry your file was not uploaded. It may be the wrong filetype.<br>. We only allow JPG And GIF filetypes.";
    }
    //If everything is ok we try to upload it
    else{
    		
    	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){
    		//insert image insert query here
    		$img_type = $_FILES['uploaded']['type'];
    		$img_size = $_FILES["uploaded"]["size"];
    		$img_name = $_FILES["uploaded"]["name"];
    		$sql = "INSERT INTO images(parts_id,image_type,image_size,image_name)
    		VALUES ('$last_id','$img_type','$img_size','$img_name')";

    		if ($conn->query($sql) === TRUE) {
    		    echo "New image record created successfully";
    		} else {
    		    echo "Image upload error: " . $sql . "<br>" . $conn->error;
    		}

    		$conn->close();
    		
	    	echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
    	}
    	else{
    		echo "Sorry, there was a problem uploading your file.";
    	}
    }

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();


?>