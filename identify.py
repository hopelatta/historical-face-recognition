import face_recognition
import json
import sys

#get the face encoding argument passed in
encoding_to_find = sys.argv[1]  
#print("<p>find this face...: " + encoding_to_find + "</p>")

#get all face encodings to compare against
encodings_file = open("encodings.txt")

#print("<p>in this collection of faces: ")
#for encoding in encodings_file:
#    print("<br/>face encoding: " + encoding)
#print("</p>")

all_face_encodings = encodings_file 
face_image_encoding = encoding_to_find

results = face_recognition.compare_faces(all_face_encodings, face_image_encoding,  tolerance=0.8)
print("Results: " + results)
#something like...
#
# to find: encoding_to_find
# collection of encodings: encodings_json
#
#results = face_recognition.compare_faces(all_face_encodings, face_image_encoding,  tolerance=0.8)
#
# see https://face-recognition.readthedocs.io/en/latest/face_recognition.html
#