<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en"> 

<head>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
			<title>Login</title>
    </head>
    
    <body>
		<div class="container">
        
        <?php

				$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

				if ($action === "login") {
					
					$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
					$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

					$db_servername = "localhost:3306";
					$db_username = "root";
					$db_password = "admin";
                    $db_name = "orders";

                    $db_conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
					if ($db_conn->connect_error) {
						die("Connection failed: " . $db_conn->connect_error);
					} 

					$sql = "SELECT * FROM users WHERE username = '".$username."' and password = '".$password."'";

                    //echo $sql;

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

					echo "<h3 class='p-3 text-success'>Welcome to the application, " . $_SESSION["username"] . "</h3>";
					
					echo "<h4 class='p-3'>You can go to the <a href='report.php'>report page</a></h4>";
					
					echo "<br/><br/><br/><br/><p>";

					echo "<a href='main.php?action=logout'>logout</a>";
					
				} else {
					
					echo '<script type="text/javascript">
						   window.location = "index.php"
					  </script>';	
					  
				}
                ?>
                
                </div>
		</div>
	</body>
</html>