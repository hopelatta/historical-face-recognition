/* This is where the machine learning will go */

//
// Retrieve all face encodings from the database
// select id, encodings from personphoto
//
all_encodings = [];
//
// Get the face encodings for the current photo
//
//
current_face_encodings = ""


/* Calls the recognize.py file */

$nameGuess = escapeshellcmd('faceObject.py');
