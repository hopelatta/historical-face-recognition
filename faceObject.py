# Next step: having recognize.php call recognize()
# Have upload call add_picture()

import face_recognition

class FaceDetails:
    # Create face object
    def __init__(self, _imageId = 0, _faceEncoding = None):
        self.ImageId = _imageId
        self.FaceEncoding = _faceEncoding

known_encoding_faces = []
all_face_encodings = []
count = 0

int faceCount = 0

def add_picture():
    # get file from the php upload or database
    filename = "pic.jpg" 
    face_image = face_recognition.load_image_file(filename)
    face_image_encoding = face_recognition.face_encodings(face_image)[0]
    face = FaceDetails(faceCount,face_image_encoding)
    known_encoding_faces.append(face)

for item in known_encoding_faces:
    all_face_encodings.append(item.FaceEncoding)
    count += 1

def recognize():
    # compare the selected face encoding with the list of all face encodings
    results = face_recognition.compare_faces(all_face_encodings, face_image_encoding,  tolerance=0.8)
    index_key = 0
    matched_image_id = ""
    for matched in results:
        if matched:
            # so we found this user with index key and find him
            face = known_encoding_faces[index_key]
            matched_image_id = face.ImageId
            print ("matched (imageId: " + matched_image_id + ")")
            break
        index_key = index_key + 1
