
<?php

// Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

$msg = "";

// If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	
$target_dir = "storage/".basename($image);
    
      //Add to database: 
      $sql = "INSERT INTO images (name, image) VALUES ('$name', '$image')";
  	// execute query
  	mysqli_query($db, $sql);
      
  
?>