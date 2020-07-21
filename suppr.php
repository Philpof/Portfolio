<?php
  include "connexion.php";

  // Pour supprimer l'entrée par le bouton"Supprimer" de la page "adminSQL.php"
  if (isset($_GET['idSuppr'])) {
      $supprEntreepropos = $bdd->prepare('DELETE FROM propos WHERE id = :idSuppr') ;
      $supprEntreepropos->execute(array(':idSuppr' => $_GET['idSuppr']));

      header('Location: adminSQL.php');
      exit();
    }
    else {
      header('Location: adminSQL.php');
      exit();
    }

?>
