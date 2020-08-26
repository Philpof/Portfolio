<?php
include "../connexion.php";

// Pour archiver l'entrée séléctionnée par le bouton "Archiver" de la page "adminSQL.php"
if (isset($_GET['idArchive'])) {
    $sql = "UPDATE propos SET archive = '1' WHERE id = :idArchive";
    $select_Archive_Propos = $db->prepare($sql);
    $select_Archive_Propos->execute(array(':idArchive'=>$_GET['idArchive']));
    header('Location: ../adminSQL.php');
    exit();
}
else {
    header('Location: ../adminSQL.php');
    exit();
}
