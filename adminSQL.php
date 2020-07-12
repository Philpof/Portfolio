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
