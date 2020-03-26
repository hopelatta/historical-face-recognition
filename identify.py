import face_recognition
import numpy as np
import json
import sys

def ConvertToNpArray(x):
    encoding = x.replace("[","")
    encoding = encoding.replace("]","")
    encoding_arr = encoding.split(", ")
    encoding_arr_np = np.array(encoding_arr)
    try:
        face_to_find = encoding_arr_np.astype(np.float) 
    except Exception as e: 
        print(e)
    return face_to_find



#get the face encoding argument passed in
face_to_find = ConvertToNpArray(sys.argv[1])

#get all face encodings to compare against
all_faces = []
encodings_file = open("encodings.txt")
for encoding in encodings_file:
    all_faces.append(ConvertToNpArray(encoding))

#compare faces
try:
    results = face_recognition.compare_faces(all_faces, face_to_find,  tolerance=0.8)
except Exception as e: 
    print(e)

#return the line number of the matched photo (in encodings.txt)
index_key = 0
matched_image_id = ""
for matched in results:
    index_key = index_key + 1
    if matched:
        print (index_key)
        break
