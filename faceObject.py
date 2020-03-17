import face_recognition

class Face: 
    # Create a face object
    
    def __init__(self, app):
        self.db = database.sql
        self.faces = [] # cache array for all faces in the face object
        self.known_encoding_faces = [] # Known faces array
        self.face_user_keys = {} # Key for all faces
        self.load_all()
        
    def load_user_by_index_key(self, index_key=0):
        key_str = str(index_key)
        if key_str in self.face_user_keys:
            return self.face_user_keys[key_str]
        return None
    
    def recognize(self, unknown_filename):
        #Get the image from the recognize.php file
        
        unknown_image = face_recognition._______ (image)
        
        # not sure what the line below does but it calls the method face_recognition from the library
        
        unknown_encoding_image = face_recognition.face_encodings(unknown_image)[0]
        
        results = face_recognition.compare_faces(self.known_encoding_faces, unknown_encoding_image);

        
        # Could print results. Not sure exactly what is in there. 
        
        # The next steps seems to be taking the result, and comparing it to the database with a loop
        # if the result is in the database
        for matched in results:
            if matched:
                # find user with index key
                name = self.load_user_by_index_key(index_key)
                return name
            index_key = index_key + 1
            
            else:
                # Not found in database
                # Could send a print to the html 
                return None
        
        
    