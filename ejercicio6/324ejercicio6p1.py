# -*- coding: utf-8 -*-
import pymysql




db = pymysql.connect(host='localhost',
        user='usuario324',
        password='123456',
        db='mibasedanielfernandez',
        charset='utf8mb4')

cursor = db.cursor()
sql = 'select ci,nombre_completo, fecha_nacimiento, departamento, rol from persona'

try:
   cursor.execute(sql)
   results = cursor.fetchall()
   for row in results:
      ci = row[0]
      nom = row[1]
      fecha = row[2]
      dep = row[3]
      rol = row[4]
      print ("{0:3d}  {1:40s}   {2:10s} {3:2s}  {4:10s}".format(ci, nom, fecha.strftime('%Y/%m/%d'), dep, rol))
except:
   print ("Error")
   


print('CI:'); ci = input()
print('Nombre completo:'); nom = input()
print('Fecha nacimiento(YYYY-MM-DD):'); fecha = input()
print('Departamento:'); dep = input()
insert = 'insert into persona(ci, nombre_completo, fecha_nacimiento, departamento, rol) values('+ci+',"'+nom+'","'+fecha+'","'+dep+'","estudiante");'

print('CI:'); ci = input()
print('Nombre completo:'); nom = input()
print('Fecha nacimiento(YYYY-MM-DD):'); fecha = input()
print('Departamento:'); dep = input()
insert2 = 'insert into persona(ci, nombre_completo, fecha_nacimiento, departamento, rol) values('+ci+',"'+nom+'","'+fecha+'","'+dep+'","estudiante");'


#insert = 'insert into persona(ci, nombre_completo, fecha_nacimiento, departamento, rol) values(8,"loois jamilton", "1983-10-14", "lp", "estudiante");'
#insert2 = 'insert into persona(ci, nombre_completo, fecha_nacimiento, departamento, rol) values(9,"sharl lecle", "1999-08-23", "sc", "estudiante");'





try:
   cursor.execute(insert)
   db.commit()
   cursor.execute(insert2)
   db.commit()
   print("\nInserción realizada con exito\n")
except:
   print ("Error")
   
   
try:
   cursor.execute(sql)
   results = cursor.fetchall()
   for row in results:
      ci = row[0]
      nom = row[1]
      fecha = row[2]
      dep = row[3]
      rol = row[4]
      print ("{0:3d}  {1:40s}   {2:10s} {3:2s}  {4:10s}".format(ci, nom, fecha.strftime('%Y/%m/%d'), dep, rol))
except:
   print ("Error")

