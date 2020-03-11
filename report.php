<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en"> 
	<head>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
			<title>Report</title>
	</head>
	<body>
		<div class="container">
			
			<div class="row">
				<div class="col-sm-8 p-3">

				<?php
				$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;

				if ($isLoggedIn === true) {
					echo "<h4 class='p-3'>History:</h4>";
						
					$db_servername = "localhost:3306";
					$db_username = "root";
					$db_password = "admin";
					$db_name = "images";

					$db_conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
                    
                    //Check connection
					if ($db_conn->connect_error) {
						die("Connection failed: " . $db_conn->connect_error);
					} 
                    

					$sql = "SELECT pid, name FROM images";
					$db_result = $db_conn->query($sql);
                    
                    /* Not sure what this does: 
					if ($db_result->num_rows > 0) {
						echo "<table class='table'><tr><th>ID</th><th>Photo ID </th><th>Detail</th></tr>";
						// output data of each row
						while($row = $db_result->fetch_assoc()) {
							echo "<tr><td>".$row["pid"]."</td><td>".$row["name"]."</td><td><a href='order.php?orderId=".$row["pid"]. "'>view detail</a></td></tr>";
						}
						echo "</table>";
					} else {
						echo "0 results";
					}
                    */
					
					echo "<p><a href='loginaction.php'>back</a></p>";
					
				} else {
					
					echo '<script type="text/javascript">
						   window.location = "WWIIlogin.html"
					  </script>';	
					  
				}
				?>


				</div>
				<div class="col-sm-2 p-3">
				
				</div>
			</div>
		</div>
	</body>
</html>