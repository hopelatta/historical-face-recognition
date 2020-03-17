<?php
session_start();

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

if ($isLoggedIn === true) {

	include 'header.php';
	include 'database.php';

	echo "<h4 class='p-3'>History:</h4>";

	$db_conn = OpenDbConnection();

	$sql = "SELECT `id`, `filename`, `personname`, `description` FROM WW2FaceRec.personphoto";
	$db_result = $db_conn->query($sql);
	
	if ($db_result->num_rows > 0) {
		echo "<table border='1' class='table'><tr><th>Id</th><th>Person</th><th>Description</th><th>&nbsp;</th></tr>";
		// output data of each row
		while($row = $db_result->fetch_assoc()) {
			echo "<tr>";
			echo "	<td>".$row["id"]."</td>";
			echo "	<td>".$row["personname"]."</td>";
			echo "	<td>".$row["description"]."</td>";
			echo "	<td>[view]</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<p>There ar eno photos in the collection.</p>";
	}
	
	include 'footer.php';
	
} else {
	header("Location: index.php");
}
?>