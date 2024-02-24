<?php

$hostname = "localhost";
$username = "cesibdd";
$password = "bddcesi";
$db = "METEO";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

if(isset($_POST['submit'])) {
  $temperature=$_POST['itemperature'];
  $jour=$_POST['ijour'];
  $meteo=$_POST['imeteo'];
  $lieu=$_POST['ilieu'];
  $hour=$_POST['iheure'];

  $query = "INSERT INTO info (info_temperature,info_meteo,info_jour,info_lieu,info_capteur,info_heure)
  VALUES ('$temperature', '$meteo', '$jour','$lieu','','$hour')";

  if (!mysqli_query($dbconnect, $query)) {
      die('An error occurred. Your review has not been submitted.');
  } else {
    header('Location: http://172.20.10.2/test/si.php?ville='.$lieu.'&jour'.$jour);
  }

}
?>
