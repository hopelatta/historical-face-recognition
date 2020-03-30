<?php
session_start();

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

if ($isLoggedIn === true) {

	include 'header.php';

    ?>
    <br>
    <h3> Homepage </h3>
    <br>

    <p>
    Welcome to the facial recognition database. Use the navigation bar above
    to upload or identify a picture. 
    </p>
    
    <div class="field">
            <img src="designphotos/flandersfields.jpg" alt="Avatar" class="avatar">
    </div>
    <div class="horse">
            <img src="designphotos/horse.gif" alt="Avatar" class="avatar">
    </div>
    <div class="hantsport.jpg">
            <img src="designphotos/hantsport.jpg" alt="Avatar" class="avatar">
    </div>

    <?php

	include 'footer.php';
	
} else {
    header("Location: index.php");

}
?>




