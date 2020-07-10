<?php
  $servername = "localhost";
  $username = "root"; // Sauf si le nom à été modifié
  $password = ""; // Champs vide car par de MDP
  $dataBaseName = "portfolio"; // On fait une variable pour le nom de la base de données

  try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dataBaseName", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully / Connexion effectuée avec succès";
    echo "<hr>";
  } catch(PDOException $e) {
    echo "Connection failed / Echec de la connexion : " . $e->getMessage();
    echo "<hr>";
  }
?>
