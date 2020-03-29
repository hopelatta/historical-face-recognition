<?php
session_start();

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

if ($isLoggedIn === true) {

	include 'header.php';

    ?>

    <h3> Homepage </h3>
    <?php


	include 'footer.php';
	
} else {
	header("Location: index.php");
}
?>




