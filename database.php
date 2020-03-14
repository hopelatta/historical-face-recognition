<?php
function OpenDbConnection()
 {
    $db_servername = "localhost:3306";
    $db_username = "WW2App";
    $db_password = "faceRecApp";
    $db_name = "WW2FaceRec";

    $db_conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    if ($db_conn->connect_error) {
        die("Connection failed: " . $db_conn->connect_error);
    } 

     return $db_conn;
 }
 
function CloseCon($conn)
 {
    $db_conn -> close();
 }
?>
