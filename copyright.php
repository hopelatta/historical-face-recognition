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
    <h4> Copyright </h4>
    <br/>

    <h1> Contact information: </h1>

    <p> Please contact the Hantsport Historical Society for more information regarding photographs. 
    <br>
    <br>
    Email: hantsportareahistoricalsociety@gmail.com
    <br>
    Student: Hope Latta
    <br>
    Email: hopelatta@hotmail.com 
    <br>
    <br>
    Supervisor: Professor Jamie Symonds
    <br>
    Email: jamie.symonds@acadiau.ca
    <br>
    <br>
    Jodrey School of Computer Science
    <br>
    Located in: Acadia University
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




