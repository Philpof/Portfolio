<?php
  include "connexion.php";

  // Pour supprimer l'entrée par le bouton"Supprimer" de la page "adminSQL.php"
  if (isset($_GET['id'])) {
      $supprEntreepropos = $bdd->prepare('DELETE FROM propos WHERE id = :id') ;
      $supprEntreepropos->execute(array(':id' => $_GET['id']));

      header('Location: adminSQL.php');
      exit();
    }
    else {
      header('Location: adminSQL.php');
      exit();
    }

?>
