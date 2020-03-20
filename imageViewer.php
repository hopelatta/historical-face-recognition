<?php
session_start();

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : false;

if ($isLoggedIn === true) {

	include 'database.php';

	$db_conn = OpenDbConnection();

    $sql = "SELECT filecontent FROM personphoto WHERE id = " . $id;

    $sth = $db_conn->query($sql);

    $result=mysqli_fetch_array($sth);

    echo '<img width="400" src="data:image/jpeg;base64,'.base64_encode( $result['filecontent'] ).'"/>';

} else {
	echo("<p>User is not logged in</p>");
}
