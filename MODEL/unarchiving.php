<?php
include "../connexion.php";

// Pour désarchiver l'entrée séléctionnée par le bouton "Désarchiver" de la page "adminSQL.php"
if (isset($_GET['idDesarchive'])) {
    $sql = "UPDATE propos SET archive = '0' WHERE id = :idDesarchive";
    $select_Desarchive_Propos = $db->prepare($sql);
    $select_Desarchive_Propos->execute(array(':idDesarchive'=>$_GET['idDesarchive']));
    header('Location: ../adminSQL.php');
    exit();
}
else {
    header('Location: ../adminSQL.php');
    exit();
}
