<?php
// Connection to the datebase
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "portfolio";

try {
    $db = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connOK = "<div class='alert alert-success' role='alert'>Connected successfully / Connexion effectuée avec succès</div>";
} catch(PDOException $e) {
    $connKO = "Connection failed / Echec de la connexion : " . $e->getMessage();
    echo $connKO;
    exit();
}

// Pour afficher la dernière entrée du champ "contenu" de la base de données
$sql = "SELECT id, contenu FROM propos WHERE archive='0' ORDER BY id DESC LIMIT 1";
foreach ($db -> query($sql) as $lastPropos) {
}
