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

    <h3> Please contact the Hantsport Historical Society for more information regarding photographs. </h3>
    <h3>
    Email: hantsportareahistoricalsociety@gmail.com
    </h3>


    <?php


	include 'footer.php';
	
} else {
	header("Location: index.php");
}
?>




