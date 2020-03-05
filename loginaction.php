<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

#Ensure that usernames are not empty: 

if (!empty($username)) {
    if (!empt($password)){
        # Both the username and password are not empty
        
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "Login";
    }
    else {
        echo "Password is empty";
        die();
    }
}
else
{
    echo "Username should not be empty"; 
    die();
}

?>