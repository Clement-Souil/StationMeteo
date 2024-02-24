<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <link rel="icon" href="./Assets/logo.png">
    <title>Météo</title>
</head>

<?php
// Basic connection settings
$databaseHost = 'localhost';
$databaseUsername = 'cesibdd';
$databasePassword = 'bddcesi';
$databaseName = 'METEO';

// Connect to the database
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
//Check connection
if ($conn->connect_error) {
  var_dump($conn->connect_error);
  die("Connection failed: " . $conn->connect_error);
}
?>

<body onload="ChangerFond()">
    <header>
        <table>
            <tr>
                <td><a href=""><img src="./Assets/logo.png" alt="Logo météo"></a></td>
                <td><input id="lk" type="text"></td>
                <td></td>
                <td><Button onclick="javascript:Rechercher()">Rechercher</Button></td>
                <td><a href="javascript:visibilite();"><button>Ajouter des données !</button></a></td>
            </tr>
        </table>
    </header>
    <section id="Actuel">
        <table>
            <tr>
                <td class="test">    
                    <p id="Lieu">
                    <h2>PAU | 11/06/2004</h2> 
                    <p>Le temps sera particulièrement couvert.</p>
                    </p>
                </td>
		<td class="test">
                    <p>Température <p>12°C</p></p>
		</td>
                <td class="test">         
                    <img id="temps" src="./Assets/sun.png" alt="soleil">
                </td>
            </tr>
        </table>
    </section>
    <hr>
    <section id="d1">
        <p id="selector">
            <a href="#sql" name="Precedent" onclick="ChangerDate(this.name)">←</a>
            <a href="#sql" name="Hier" onclick="ChangerDate(this.name)">HIER</a>
            <a href="#sql"  name="Aujourd'hui" onclick="ChangerDate(this.name)">AUJOURD'HUI</a>
            <a href="#sql" name="Demain" onclick="ChangerDate(this.name)">DEMAIN</a>
            <a href="#sql" name="Suivant" onclick="ChangerDate(this.name)">→</a>
            <p id="day">0</p>
        </p>
        <section id="sql">

            <table border="1" align="center">
                <thead>
                    <tr>
                    <th colspan="7" style="align-self: center;"><p id="Dte">Aujourd hui</p></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Ville</td>
                    <td>Temperature</td>
                    <td>Pression</td>
                    <td>Meteo</td>
                    <td>Jour</td>
                    <td>Heure</td>
                    <td>Humidité</td>
                </tr>

                <?php
		$ville = $_GET['ville'];
		$Verif = "False";
		$reqsql = "SELECT * FROM info WHERE info_lieu = '".$ville."'";
                $query = mysqli_query($mysqli, $reqsql)
                or die (mysqli_error($mysqli));
		echo "<p>$reqsql</p>";
		
                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                    <td>{$row['info_lieu']}</td>
                    <td>{$row['info_temperature']}</td>
                    <td>{$row['info_pression']}</td>
                    <td>{$row['info_meteo']}</td>
                    <td>{$row['info_jour']}</td>
                    <td>{$row['info_heure']}</td>
                    <td>{$row['info_humidite']}</td>
                    </tr>\n";
                }
                ?>
                </tbody>
            </table>
        </section>

    </section>
    <section id="d2" style="display:none">
        <form action="ajouter.php" method="post">
            <ul>
              <li>
                <label for="localisation">Localisation &nbsp;:</label>
                <input type="text" name="ilieu" value="Pau"/>
              </li>
              <li>
                <label for="temp">Temperature en celcius &nbsp;:</label>
                <input type="number" name="itemperature" value="0" min="-50" max="50">
              </li>
              <li>
                <label for="meteo">Meteo &nbsp;:</label>
                    <select name="imeteo" id="idmeteo">
                        <option value="Nuageux">Nuageux</option>
                        <option value="Ensoleillé">Ensoleillé</option>
                        <option value="Légérement nuageux">Légérement nuageux</option>
                        <option value="Fortement nuageux">Fortement nuageux</option>
                        <option value="Légére pluie">Légére pluie</option>
                        <option value="Pluie">Pluie</option>
                        <option value="Orage">Orage</option>
                        <option value="Neigeux">Neigeux</option>
                        <option value="Brouillard">Brouillard</option>
                    </select>
                <!--<input type="text" name="imeteo" value="Nuageux" />-->
              </li>
              <li>
                <label for="jour">Date &nbsp;:</label>
                <input type="date" name="ijour" />
              </li>
            </ul>
            <br>
            <input type="submit" id="envoyer" name="submit">
          </form>
    </section>
    <hr>
    <footer>
        <p>Site réalisé par Clément SOUIL et Enzo AGOSTINHO</p>
        <p>copyright - tous droits réservés</p>
    </footer>
</body>
</html>
