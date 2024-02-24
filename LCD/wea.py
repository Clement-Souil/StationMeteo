#!/usr/bin/python
import requests
from datetime import datetime

city = input("Enter City:")

url = 'http://api.openweathermap.org/data/2.5/weather?q={}&appid=e38c0b4503392ba2a78c01b17ccd2fa3&units=metric'.format(city)

res = requests.get(url)
data = res.json()

humidity = data['main']['humidity']
pressure = data['main']['pressure']
wind = data['wind']['speed']
description = data['weather'][0]['description']
temp = data['main']['temp']

match description:
    case "clear sky":
        description = "Ensoleillé"
    case "few clouds":
        description = "Légérement nuageux"
    case "scattered clouds":
        description = "Nuageux"
    case "broken clouds":
        description = "Fortement nuageux"
    case "shower rain":
        description = "Légére pluie"
    case "light rain":
        description = "Légére pluie"
    case "rain":
        description = "Pluie"
    case "thunderstorm":
        description = "Orage"
    case "snow":
        description = "Neigeux"
    case "mist":
        description = "Brouillard"
    case "overcast clouds":
        description = "Ciel couvert"

if "clouds" in description:
  description = "Nuageux"

if "snow" in description:
  description = "Neigeux"

if "drizzle" in description:
  description = "Bruine"

if "rain" in description:
  description = "Pluie"

minuteX = str(datetime.now().minute)
hourX = str(datetime.now().hour)
if int(datetime.now().minute)<10:
  minuteX = "0"+str(datetime.now().minute)
if int(datetime.now().hour)<10:
  hourX = "0"+str(datetime.now().hour)
myHour = hourX + ":" + minuteX

print("ville :",city)
print('Temperature:',temp,'°C')
print('Pressure: ',pressure)
print('Humidity: ',humidity)
print('Description:',description)
print('Jour :',datetime.now().date())
print('Heure :',myHour)

from script import addData

addData("",temp,pressure,datetime.now().date(),myHour,humidity,city,description)
