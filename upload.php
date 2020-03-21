<?php
session_start();

$isLoggedIn = isset($_SESSION['isLoggedIn']) ? $_SESSION['isLoggedIn'] : false;
$action = isset($_POST['action']) ? $_POST['action'] : false;
$personname = isset($_POST['personname']) ? $_POST['personname'] : false;
$description = isset($_POST['description']) ? $_POST['description'] : false;

if ($isLoggedIn !== true) {
        header("Location: index.php");
        exit();
}

if ($action == "upload") {
        echo("<p>handle upload</p>");
        
        include 'database.php';

        $db_conn = OpenDbConnection();

        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                /* Get information from file */ 
                /* File Content is the photo, and the name is what the photo was named */
                $fileContent = addslashes(file_get_contents($_FILES['file']['tmp_name'])); 
                $fileName = $_FILES['file']['name'];

                //save file as pic.jpg for recognize.py (not able to pass in a binary object etc.)
                $fp = fopen('pic.jpg', 'w');
                fwrite($fp, file_get_contents($_FILES['file']['tmp_name']));
                fclose($fp);                

                //get encodings for face and add them to the database with the image.
                //requires that the pyhton environment has cmake, dlib, and face_recognition (e.g. pip install ...)
                $command = escapeshellcmd('recognize.py');
                $encodings = shell_exec($command);

                /* Add info to database */
                $sql = "insert into `personphoto` (`personname`,`description`,`filecontent`, `filename`, `encodings`) values ('{$personname}','{$description}', '{$fileContent}', '{$fileName}', '{$encodings}')";

                /* Checks to see if file upload is successful */
                if ($db_conn->query($sql) === TRUE) {
                        echo '<p>upload successful (id: ' . $db_conn->insert_id . ')'; 
                } else {
                        echo '<p>upload failure</p>'; 
                }
                echo("<p><a href='report.php'>back</a>");
        }
        else 
        {
                echo("<p>Error, no photo.</p>");
        }
} 
else 
{
?>
        <?php include 'header.php';?>

        <div class="loginImage">
            <img src="LoginAvatar.png" alt="Avatar" class="avatar">
        </div>

        <h2>To upload a photo, ensure that the name of the photo is the name of the person in it. Ensure that there are no extra characters in the title. </h2>

        <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload: 
                <input type="file" name="file" id="fileToUpload">
                <br/>
                Name: <input type="text" name="personname"/>
                <br/>
                Description: <input type="text" name="description"/>
                <input type="hidden" name="action" value="upload"/>
                <input type="submit" value="Upload" name="Submit"> 
        </form>

        <?php include 'footer.php';?>
<?php
}
?>