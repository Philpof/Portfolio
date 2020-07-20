<?php

// Connection serveur

$servername = "localhost";
$username = "root";
$password = "";
$dataBaseName = "portfolio";

  try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dataBaseName", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connOK = "<div class='alert alert-success' role='alert'>Connected successfully / Connexion effectuée avec succès</div>";
  } catch(PDOException $e) {
    $connKO = "Connection failed / Echec de la connexion : " . $e->getMessage();
    echo $connKO;
  }


// Pour afficher la dernière entrée du champ "contenu" de la base de données
  $sql = "SELECT id, contenu FROM propos ORDER BY id DESC LIMIT 1";
  foreach ($bdd -> query($sql) as $lastPropos) {
    $test = $lastPropos['contenu'];
  }

?>
