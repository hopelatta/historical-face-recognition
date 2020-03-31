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
    <br>
    <br>
    <h1> Copyright </h1>
    <br/>

    <h2> Contact information: </h2>

    <p> Please contact the Hantsport Historical Society for more information regarding photographs. 
    <br>
    Email: hantsportareahistoricalsociety@gmail.com
    <br> 
    <a href="https://www.facebook.com/HantsportAreaHistoricalSociety/"> Facebook </a> 
    </p>
    <p>
    Student: Hope Latta
    <br>
    Email: hopelatta@hotmail.com 
    <br>
    <br>
    Jodrey School of Computer Science
    <br>
    Acadia University
    <br>
    Address: 27 University Ave, Wolfville, NS B4P 2P7
    <br>
    Phone: (902) 585-1331
    <br>
    Province: Nova Scotia
    </p>

    <div class="logo">
            <img src="designphotos/logo.jpg" alt="Avatar" class="avatar">
        </div>
    <?php


	include 'footer.php';
	
} else {
	header("Location: index.php");
}
?>




