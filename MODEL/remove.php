<?php
include "../connexion.php";

// Pour supprimer l'entrée par le bouton"Supprimer" de la page "adminSQL.php"
if (isset($_GET['idSuppr'])) {
    $suppr_Entree_Propos = $db->prepare('DELETE FROM propos WHERE id = :idSuppr') ;
    $suppr_Entree_Propos->execute(array(':idSuppr' => $_GET['idSuppr']));
    header('Location: ../adminSQL.php');
    exit();
}
else {
    header('Location: ../adminSQL.php');
    exit();
}
