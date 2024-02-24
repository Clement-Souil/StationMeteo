import time

from datetime import datetime

minuteX = str(datetime.now().minute)
if int(datetime.now().minute)<10:
  minuteX = "0"+str(datetime.now().minute)
myHour = str(format(datetime.now().hour,'2')) + ":" + minuteX

print(myHour)
