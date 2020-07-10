<?php
include "header.php";
?>

<section class="container">

  <h1 class="text-center">Page d'administration SQL</h1>
  <hr>
  <a href="index.php">Revenir au site</a>
  <hr>

  <!-- Connection serveur -->
  <p class="font-weight-bold">Connection à la basse de donnée "portfolio" :</p>
  <?php
    $servername = "localhost";
    $username = "root"; // Sauf si le nom à été modifié
    $password = ""; // Champs vide car par de MDP
    $dataBaseName = "portfolio"; // On fait une variable pour le nom de la base de données

    try {
      $bdd = new PDO("mysql:host=$servername;dbname=$dataBaseName", $username, $password);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully / Connexion effectuée avec succès";
      echo "<hr>";
    } catch(PDOException $e) {
      echo "Connection failed / Echec de la connexion : " . $e->getMessage();
      echo "<hr>";
    }
  ?>


  <!-- Pour afficher la dernière entrée du champ "contenu" de la base de données -->
  <p class="font-weight-bold">Dernière entrée du champ "contenu" de la table "propos" :</p>
  <?php
    $sql = "SELECT id, contenu FROM propos ORDER BY id DESC LIMIT 1";
    foreach ($bdd -> query($sql) as $lastPropos) {
      echo $lastPropos['contenu'] . '<br>';
    }
    echo "<hr>";
  ?>

  <!-- <form method="post" action="index.php">
    <input type="text" name="contenuTest"><br>
    <input type=hidden value="$lastPropos">
  </form> -->


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
