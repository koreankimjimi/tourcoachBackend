#!/usr/bin/python
#-*- coding: utf-8 -*-
import pymysql
import sys
import time
from konlpy.tag import Kkma
from konlpy.utils import pprint
 
#코엘엔파이 로딩
kkma = Kkma()


#MySQL Connection 연결
conn = pymysql.connect(host='localhost', user='root', password='wlalswl1',
                  db='tourcoach', charset='utf8')

# Connection 으로부터 Cursor 생성
cur = conn.cursor();
#여기서 부터 루프 시작.
while True :
   cur.execute("select id, text from naturalLanguage where result = ''");
   rows = cur.fetchall()
   for row in rows:
      rowID = row[0] #id 가져와서.
      nouns = kkma.pos(row[1])    #text 값을 명사로 분리.
      print (nouns)
      arr = []
      for data in nouns:
         if len(data) > 1:
            arr.append(data)
      nouns = str(arr)
      print (nouns)
      sql = "UPDATE naturalLanguage SET result = %s WHERE id=%s"
      cur.execute(sql, (nouns, rowID))
      print("쿼리 실행")
   conn.commit()
   time.sleep(0.2) #0.2초 간격으로 DB검사.
   

conn.close()
