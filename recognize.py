import face_recognition
import json

#may have to add libraries to your Pyhton env, 
#from regular Mac terminal:
# python3 -m pip install face_regognition
#and... you might also need this:
# python3 -m pip install cmake
#and/or...this:
# python3 -m pip install dlib

filename = "pic.jpg"

#pass face_recognition's load_image_file method the name of a picture fiel
face_image = face_recognition.load_image_file(filename)

#using the face_image, get the face_encodings
face_image_encoding = face_recognition.face_encodings(face_image)[0]

#return the face_encodings
jsonString  = json.dumps(face_image_encoding.tolist())
print(jsonString)