<?php
  include "connexion.php";

  // Pour afficher les informations de l'entrée séléctionnée par le bouton"Modifier" de la page "adminSQL.php"
  if (isset($_GET['idSelect'])) {
    $select_Ent_Prop = $bdd->prepare('SELECT id, titre, contenu FROM propos WHERE id = :idSelect');
    $select_Ent_Prop->execute(array(':idSelect'=>$_GET['idSelect']));
    $row_idSelect = $select_Ent_Prop->fetch();
  }
?>
