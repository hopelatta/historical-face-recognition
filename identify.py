import face_recognition
import numpy as np
import json
import sys
import MySQLdb  #pip install MySQL-python

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

def GetEncodingsFromDatabase():
    db_faces = []
    db = MySQLdb.connect(user="WW2App", password="faceRecApp", database="WW2FaceRec", host="localhost")
    cursor = db.cursor()
    sql = "SELECT encodings FROM `personphoto`"
    try:
        cursor.execute(sql)
        for row in cursor:
            row = cursor.fetchone()
            db_faces.append(row[0])
    except Exception as e:
        print(e)
    db.close()

    all_faces = []
    for encoding in db_faces:
        all_faces.append(ConvertToNpArray(encoding))
    return all_faces

#get the face encoding argument passed in
face_to_find = ConvertToNpArray(sys.argv[1])

#get all face encodings to compare against
all_faces = GetEncodingsFromDatabase()

#compare faces
try:
    results = face_recognition.compare_faces(all_faces, face_to_find,  tolerance=0.8)
except Exception as e: 
    print(e)

#return the line number of the matched photo
index_key = 0
for matched in results:
    index_key = index_key + 1
    if matched:
        print (index_key)
        break