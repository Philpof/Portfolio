<?php
include "header.php";
include "connexion.php";

// Login par mot de passe
$mdp = "Pomme";


if (!isset($_POST['login'])) {
  echo "<section class='container'><div class='alert alert-danger mt-5' role='alert'>Accès refusé</div><hr>
    <a href='index.php'>Revenir au site</a>
    <hr></section>";
}
elseif ($_POST['login'] == $mdp && !empty($_POST['login'])) {

    $mdp_OK = "<div class='alert alert-success' role='alert'>Bienvenu Philippe !</div>";



?>


<section class="container">

  <h1 class="text-center">Page d'administration SQL</h1>
  <hr>

  <!-- Afficher la réponse au bon mot de passe -->
  <?php

    echo $mdp_OK;

  ?>

  <hr>
  <a href="index.php">Revenir au site</a>
  <hr>



  <!-- Connection serveur -->
  <p class="font-weight-bold">Connection à la basse de donnée "portfolio" :</p>
  <?php
  if (isset($connOK)) {
    echo $connOK. "<hr>";
  }
  elseif (isset($connKO)) {
    echo $connKO;
  }
  ?>

  <!-- Pour faire une entrée dans la base donnée -->
  <p class="font-weight-bold">Effectuer une nouvelle entrée dans la table "propos" :</p>

  <?php
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
      try {
        $nvl_Ent_Prop = $bdd->prepare('INSERT INTO propos (titre, contenu) VALUES (:titre, :contenu)');
        $nvl_Ent_Prop->execute(array(
          ':titre' => $_POST['titre'],
          ':contenu' => $_POST['contenu']
        ));
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    }
    else {
      echo "<u>Compléter les 2 champs :</u>";
    }
  ?>

  <form action="" method="post">
    <br>
    <label for="titre" class="col-sm-2 col-lg-1 align-top">Titre</label>
    <input type="text" name="titre" value="" class="col-sm-4 align-top">
    <br>
    <label for="contenu" class="col-sm-2 col-lg-1 align-top">Contenu</label>
    <textarea name="contenu" rows="10" class="col-sm-10 align-top"></textarea>

    <input type="submit" name="submit" value="Envoyer" class="offset-lg-1 col-sm-2 mt-1">
  </form>
  <hr>




  <!-- Pour afficher la dernière entrée du champ "contenu" de la base de données -->
  <p class="font-weight-bold">Dernière entrée du champ "contenu" de la table "propos" :</p>
  <?php
    echo $lastPropos['contenu']. '<hr>';
  ?>


  <!-- Pour afficher toutes les entrées et les champs de la base de données -->
  <p class="font-weight-bold">Contenu de la table "propos" :</p>
  <?php
  $sql = "SELECT * FROM propos";
  echo "<table class='table table-hover table-striped'>
          <thead>
            <tr>
              <th>id.</th>
              <th>Titre</th>
              <th>Date</th>
              <th>Contenu</th>
            </tr>
          </thead>
          <tbody>";
  foreach ($bdd -> query($sql) as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['titre'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['contenu'] . "</td>";
    echo "<td><form action='adminSQL.php' method='post'><button type='submit' name'suppr' class='btn btn-outline-dark'>Supprimer</button></form></tr>";
  }
  echo "</tbody></table><hr>";

// a faire !!!!!!
  // if (!empty($_POST['suppr'])) {
  //   try {
  //     $suppr_Ent_Prop = $bdd->prepare('DELETE FROM propos WHERE id="8"');
  //   } catch (\Exception $e) {
  //     echo $e->getMessage();
  //   }
  // }
  ?>




</section>

<?php
}
else {
  echo "<section class='container'><div class='alert alert-danger mt-5' role='alert'>Mot de passe incorrect !</div><hr>
    <a href='login.php'>Réessayer ?</a>
    <hr></section>";
}
include "footer.php";
?>
