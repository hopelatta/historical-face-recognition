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
    <p> https://50plusworld.com/remembrance-and-veterans-day-in-flanders-fields/ <p>
    
    <div class="horse">
            <img src="designphotos/horse.gif" alt="Avatar" class="avatar">
    </div>
    <p> http://www.plume-escampette.com/la-naissance-du-vers-libre/ </p>
  
    <div class="hantsport.jpg">
            <img src="designphotos/hantsport.jpg" alt="Avatar" class="avatar">
    </div>
      <p> https://www.facebook.com/HantsportAreaHistoricalSociety/ </p>
    <?php

	include 'footer.php';
	
} else {
    header("Location: index.php");

}
?>




