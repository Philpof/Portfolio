<?php
  // On prolonge la session
  session_start();
  // On teste si la variable de session existe et contient une valeur
  if(!isset($_SESSION['login']))
  {
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: login.php');
  exit();
  }
  else {
  include "connexion.php";
  include "select.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Philippe PERECHODOV">
  <title>Page d'Administration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<section class="container bg-light pt-5 pb-5">

  <h1 class="text-center">Page d'administration SQL</h1>
  <hr>


<!-- Afficher le message de bienvenu -->
<?php
  echo "<div class='alert alert-info text-center' role='alert'>Bonjour, " . $_SESSION['login'] ." !</div>";
?>


<!-- Liens pour retourner au site et pour se déconnecter de la session -->
  <hr>
  <div class="px-5 row justify-content-between">
    <a href="index.php">Revenir au site</a>
    <a href="logout.php" class="text-danger">Déconnexion</a>
  </div>
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


  <!-- Changer le MDP -->
  <?php
  if (isset($_POST['newMDP'])) {
    if ($_POST['newMDP'] != null && !empty($_POST['newMDP'])) {
      try {
        $newMDP = $db->prepare('UPDATE users SET mdp = :mdp WHERE id = "1"');
        $newMDP->execute(array(':mdp' => password_hash($_POST['newMDP'], PASSWORD_BCRYPT)));
        header('Location: adminSQL.php');
        exit();
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    }
  }
  ?>
  <form action="" method="post">
    <label for="newMDP" class="col-sm-8 col-lg-3 align-top">Nouveau mot de passe :</label>
    <input type="newMDP" name="newMDP" id="newMDP" class="col-sm-4 align-top border border-info" required>
    <input type="submit" name="submit" value="Valider" class="offset-lg-1 col-sm-2">
  </form>
  <hr>


  <!-- Pour faire une entrée dans la base donnée ou en modifier déjà une -->
  <p class="font-weight-bold">Effectuer une nouvelle entrée dans la table "propos" ou modifier une entrée existante :</p>

  <?php
    // Pour faire une entrée dans la base donnée
    if (!isset($_GET['idSelect']) && !isset($row_idSelect) && !empty($_POST['titre']) && !empty($_POST['contenu']) && !isset($_POST['Annuler'])) {
      try {
        $nvl_Ent_Prop = $db->prepare('INSERT INTO propos (titre, contenu) VALUES (:titre, :contenu)');
        $nvl_Ent_Prop->execute(array(
          ':titre' => $_POST['titre'],
          ':contenu' => nl2br($_POST['contenu'])
        ));
        header('Location: adminSQL.php');
        exit();
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    }
    // Pour valider la modification dans la base de donnée de l'entrée sélectionnée
    elseif (isset($_GET['idSelect']) && isset($row_idSelect) && !empty($_POST['titre']) && !empty($_POST['contenu']) && !isset($_POST['Annuler'])) {
      try {
        $modif_Ent_Prop = $db->prepare('UPDATE propos SET titre = :titre, contenu = :contenu WHERE id = :idSelect');
        $modif_Ent_Prop->execute(array(
          ':titre' => $_POST['titre'],
          ':contenu' => nl2br($_POST['contenu']),
          ':idSelect'=>$_GET['idSelect']
        ));
        header('Location: adminSQL.php');
        exit();
      } catch (\Exception $e) {
        echo $e->getMessage();
      }
    }
    else {
      $echo_nvl_Ent_Prop = "<p>Compléter les 2 champs suivants pour créer une nouvelle entrée :</p>";
    }
  ?>

  <form action="" method="post">
    <?php
      if (!isset($row_idSelect) || isset($_POST['Annuler'])) {
        echo $echo_nvl_Ent_Prop;
        echo '<label for="titre" class="col-sm-2 col-lg-1 align-top">Titre</label>
            <input type="text" name="titre" value="" class="col-sm-4 align-top border border-info" required>
            <br>
            <label for="contenu" class="col-sm-2 col-lg-1 align-top">Contenu</label>
            <textarea name="contenu" rows="10" class="col-sm-10 align-top border border-info"></textarea>
            <input type="submit" name="Creer" value="Créer la nvl entrée" class="offset-lg-1 col-sm-2 btn btn-outline-info mt-1">';
      }
      else {
        if (isset($row_idSelect)) {
        echo "<p>Compléter les 2 champs suivants pour modifier l'entrée selectionnée :</p>";
        echo '<label for="titre" class="col-sm-2 col-lg-1 align-top">Titre</label>
            <input type="text" name="titre" value="' . $row_idSelect["titre"] . '" class="col-sm-4 align-top border border-info" required>
            <br>
            <label for="contenu" class="col-sm-2 col-lg-1 align-top">Contenu</label>
            <textarea name="contenu" rows="10" class="col-sm-10 align-top border border-info">' . $row_idSelect["contenu"] . '</textarea>
            <input type="submit" name="Modifier" value="Valider la modification" class="offset-lg-1 col-sm-2 btn btn-outline-success mt-1">
            <input type="submit" name="Annuler" value="Annuler la modification" class="offset-lg-1 col-sm-2 btn btn-outline-danger mt-1" >';
        } else {
          header('Location: adminSQL.php');
          exit();
        }
      }
    ?>
  </form>
  <hr>


  <!-- Pour afficher la dernière entrée du champ "contenu" de la base de données -->
  <p class="font-weight-bold">Dernière entrée du champ "contenu" de la table "propos" :</p>
  <?php
    echo $lastPropos['contenu']. '<hr>';
  ?>


  <!-- Pour afficher toutes les entrées et les champs de la base de données -->
  <p class="font-weight-bold">Contenu de la table "propos" non archivé :</p>
  <?php
    $sql = "SELECT * FROM propos WHERE archive='0' ORDER BY id DESC";
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
    foreach ($db -> query($sql) as $row) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['titre'] . "</td>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['contenu'] . "</td>";
      echo "<td><a href='adminSQL.php?idSelect=" . $row['id'] . "' class='btn btn-info'>Modifier</a></td>"; // Bouton "Modifier", voir la page "select.php"
      echo "<td><a href='MODEL/archiving.php?idArchive=" . $row['id'] . "' class='btn btn-warning'>Archiver</a></td>"; // Bouton "Archiver", voir la page "MODEL/archiving.php"
      echo "<td><a href='MODEL/remove.php?idSuppr=" . $row['id'] . "' class='btn btn-danger'>Supprimer</a></td></tr>"; // Bouton "Supprimer", voir la page "suppr.php"
    }
    echo "</tbody></table><hr>";
  ?>

  <!-- Pour afficher toutes les entrées de la base de données archivées -->
  <p class="font-weight-bold">Contenu de la table "propos" archivé :</p>
  <?php
    $sql = "SELECT * FROM propos WHERE archive='1' ORDER BY id DESC";
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
    foreach ($db -> query($sql) as $row) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['titre'] . "</td>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['contenu'] . "</td>";
      echo "<td><a href='MODEL/unarchiving.php?idDesarchive=" . $row['id'] . "' class='btn btn-dark'>Désarchiver</a></td></tr>"; // Bouton "Désarchiver", voir la page "MODEL/unarchiving.php"
    }
    echo "</tbody></table><hr>";
  ?>

</section>

<?php
} // fermeture du "else" en haut de page
  include "footer.php";
?>
