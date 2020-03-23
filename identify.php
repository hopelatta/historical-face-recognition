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

                $encodings = shell_exec($command);

                //echo ("Encodings".$encodings);
                // Get all face encodings from the database
                // SQL select

                $result = mysql_query("SELECT encodings FROM personphoto");
                $all_face = array();
                while($row = mysql_fetch_array($result)){
                         $all_face[] = $row[$econdings];
                        }
                
                echo ("All face encodings:".$all_face);
                //Give uploaded picture encoding and all encodings to 
                // face_recognition's compare_faces() method 
              //  $value = face_recognition.compare_faces(all_face, encodings, tolerance=0.8);
                
               // echo ("Name: ".$value)
                
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

        <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload: 
                <input type="file" name="file" id="fileToUpload">      
                <input type="hidden" name="action" value="upload"/>
                <input type="submit" value="Upload" name="Submit">           
        </form>

        <?php include 'footer.php';?>
<?php
}
?>