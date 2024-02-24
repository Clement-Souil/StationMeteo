# Module Imports
import mariadb
import sys

def addData(capteur,temperature,pression,jour,heure,humidite,lieu,meteo="Aucune donnée"):
    # Connect to MariaDB Platform
    try:
        conn = mariadb.connect(
                user="cesibdd",
                password="bddcesi",
                host="localhost",
                database="METEO"

        )
    except mariadb.Error as e:
            print(f"Error connecting to MariaDB Platform: {e}")
            sys.exit(1)

    # Get Cursor
    cur = conn.cursor()
    print(temperature,pression,jour,heure,humidite,lieu,meteo,capteur)

    cur.execute("INSERT INTO info(info_temperature, info_pression, info_jour, info_heure, info_humidite, info_lieu, info_meteo, info_capteur) VALUES(?,?,?,?,?,?,?,?)",(temperature,pression,jour,heure,humidite,lieu,meteo,capteur))
    conn.commit()
