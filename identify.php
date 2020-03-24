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

if ($action == "uploadRecognize") {
        echo("<p>handle upload to recognize</p>");
        
        include 'database.php';

        // Get DB connection
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
                //Returns a 1D array, 128 entries
                $command = escapeshellcmd('python recognize.py');
                
                //Run command, return value added to $encodings (1D array)
                $encoding_to_identify = shell_exec($command);

                // Get all face encodings from the database
                // SQL select
                $sql = "SELECT encodings FROM WW2FaceRec.personphoto";
                $db_result = $db_conn->query($sql);
                $all_faces = array();
                if ($db_result->num_rows > 0) {
                        while($row = $db_result->fetch_array(MYSQLI_ASSOC)) {
                                $all_faces[] = $row["encodings"];
                        }
                }

                //temporarily store all the encodings in a text file, for the python program (can't pass params > 8192bytes)
                for ($x = 0; $x <= count($all_faces); $x++) {
                        file_put_contents ("encodings.txt", $all_faces[$x], FILE_APPEND);
                }

                //command for calling identify.py
                $command = escapeshellcmd('python identify.py "' . $encoding_to_identify . '"');
                
                //Run command, return value added to $identify_result
                $identify_result = shell_exec($command);

                //delete the temp file
                unlink("encodings.txt");

                //
                //
                //
                //
                echo("response from identify.py is: " . $identify_result);
                //
                //
                //
                //
                //
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
        <h2> Ensure the photo is a .jpeg file. </h2>
        <h3> Recognize page </h3>

        <form action="identify.php" method="post" enctype="multipart/form-data">
                Select image to upload: 
                <input type="file" name="file" id="fileToUpload">      
                <input type="hidden" name="action" value="uploadRecognize"/>
                <input type="submit" value="Upload" name="Submit">           
        </form>

        <?php include 'footer.php';?>
<?php
}
?>