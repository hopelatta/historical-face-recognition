<!--
Name: Hope Latta
Student Number: 100106999
Course: Final Project
School: Acadia
Version: 1.0
Purpose: this is the copyright page
Notes: None.
URL: Unknown.
Known errors: 
-->
<?php
session_start();

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

if ($isLoggedIn === true) {

	include 'header.php';

    ?>

    <form action="recognize.php" method="post" enctype="multipart/form-data">
        Select image to recognize: 
        <input type="file" name="file" id="fileToUpload">
        <input type="submit" value="Upload" name="Submit"> 
    </form> 

    <?php

	include 'footer.php';
	
} else {
	header("Location: index.php");
}
?>