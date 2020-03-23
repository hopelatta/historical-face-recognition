<!--
Name: Hope Latta
Assignment: Final project
Version: 3.0
Purpose: this is the home page
Notes: None.
URL: Unknown.
Known errors: none
-->

<?php
session_start();
include 'database.php';
?>

        
<?php
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

if ($action === "login") {
	
	$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
	
	$db_conn = OpenDbConnection();

	$sql = "SELECT * FROM users WHERE username = '".$username."' and password = '".$password."'";

	$db_result = $db_conn->query($sql);

	if ($db_result->num_rows > 0) {
		$_SESSION["isLoggedIn"] = true;
		$_SESSION["username"] = $username;
	}

} elseif ($action === "logout") {
	session_unset(); 
	session_destroy(); 	
}

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

if ($isLoggedIn === true) {
	//take the user to report.php if they are signed in
	header("Location: report.php");
	exit();

} else {
	//take the user to the login if they are not signed in
	//include 'header.php';
	?>
		<form action="index.php" method="post">
			<div class="loginFields">
				<label for="username">Username</label>
				<input type="username"class="form-control"name="username"id="username"placeholder="Enter Username">
			</div>
			<div class="loginFields">
				<label for="password"> Password </label>
				<input type="password" class="form-control" id="password"name="password"placeholder="Enter password">
			</div>
			<input type="hidden" name="action" value="login"/>
			<button type="submit" class="btn btn-primary">Submit</button>
			<h4> Username: Acadia, 
				Password: Jodrey</h4>
		</form>
	<?php
	include 'footer.php';
}
?>