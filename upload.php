
<?php

header('Content-Type: application/json');

if ( 0 < $_FILES['file']['error'] ) {
echo '{"uploadfile":"failure","message":"' . $_FILES['file']['error'] . '"}';
    }
    else 
{
        /* Get information from file */ 
/* File Content is the photo, and the name is what the photo was named */
        
$fileContent = addslashes(file_get_contents($_FILES['file']['tmp_name'])); 
$fileName = $_FILES['file']['name'];

        /* Add info to database */
$sql = "insert into `personphoto` (`personId`, `filecontent`, `filename`) values ({$personId}, '{$fileContent}', '{$fileName},now())";
   
/* Checks to see if file upload is successful */
        
if ($db->query($sql) === TRUE) {
echo '{"uploadfile":"successful", "id":"' . $db->insert_id . '"}'; 
} else {
echo '{"uploadfile":"failure", "errormessage":"' . $db->error . '"}'; 
}
}
?>