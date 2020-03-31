<?php
session_start();

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

if ($isLoggedIn === true) {

	include 'header.php';
	include 'database.php';
	?>
	<br>
	<p>
	This page shows all of the photos in the database, the names, and a brief description. 
	Click the view button to see a picture of the photo. The photos are arranged in such that the first photo uploaded
	is at the top of the database. 
	<br>
 	History: 
	</p>
	<div class="loginImage">
            <img src="LoginAvatar.png" alt="Avatar" class="avatar">
        </div>
	<?php
	//echo "<h2 class='p-3'>History:</h2>";

	$db_conn = OpenDbConnection();

	$sql = "SELECT `id`, `filename`, `personname`, `description` FROM WW2FaceRec.personphoto";
	$db_result = $db_conn->query($sql);
	
	if ($db_result->num_rows > 0) {
		echo "<table border='1' class='table ReportTable'><tr><th>Id</th><th>Person</th><th>Description</th><th>&nbsp;</th></tr>";
		// output data of each row
		while($row = $db_result->fetch_assoc()) {
			echo "<tr>";
			echo "	<td>".$row["id"]."</td>";
			echo "	<td>".$row["personname"]."</td>";
			echo "	<td>".$row["description"]."</td>";
			echo "	<td><a href='imageViewer.php?id=".$row["id"]."' target='new'>view</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<p>There are no photos in the collection.</p>";
	}
	
	include 'footer.php';
	
} else {
	header("Location: index.php");
}
?>