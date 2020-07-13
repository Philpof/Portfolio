<?php
include "header.php";
include "connexion.php";
?>

<section class="container">

  <h1 class="text-center">Page d'administration SQL</h1>
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
    <label for="titre" class="col-sm-1 align-top">Titre</label>
    <input type="text" name="titre" value="" class="col-sm-2 align-top">
    <br>
    <label for="contenu" class="col-sm-1 align-top">Contenu</label>
    <textarea name="contenu" rows="10" class="col-sm-10 align-top"></textarea>
    <br>
    <input type="submit" name="submit" value="Envoyer" class="col-sm-2">
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
    echo "<tr><td>" . $row['id'] . "</td>";
    echo "<td>" . $row['titre'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['contenu'] . "</td></tr>";
  }
  echo "</tbody></table><hr>";
  ?>




</section>

<?php
include "footer.php";
?>
