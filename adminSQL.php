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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Philippe PERECHODOV">
  <title>Page d'Administration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<section class="container bg-light">

  <h1 class="text-center">Page d'administration SQL</h1>
  <hr>


  <!-- Afficher le message de bienvenu -->
  <?php
    echo "<div class='alert alert-info text-center' role='alert'>Bonjour, " . $_SESSION['login'] ." !</div>";
  ?>

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


  <!-- Pour faire une entrée dans la base donnée -->
  <p class="font-weight-bold">Effectuer une nouvelle entrée dans la table "propos" ou modifier une entrée existante :</p>

  <?php
    if (!empty($_POST['titre']) && !empty($_POST['contenu']) && !isset($_POST['Annuler'])) {
      try {
        $nvl_Ent_Prop = $bdd->prepare('INSERT INTO propos (titre, contenu) VALUES (:titre, :contenu)');
        $nvl_Ent_Prop->execute(array(
          ':titre' => $_POST['titre'],
          ':contenu' => $_POST['contenu']
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
  <!-- <p>Pour modifier une entrée existante, selectionner l'id de l'entrée à modifier :</p>
  <form action="" method="post">
    <label for="idSelect" class="col-sm-2 col-lg-1 align-top">Id N°</label>
    <input type="text" name="idSelect" placeholder="Laisser vide pour créer une nouvelle entrée" class="col-sm-4 align-top border border-info">
    <input type="submit" name="submit" value="Rechercher l'id à modifier" class="col-sm-2 btn btn-outline-dark btn-sm mt-n1">
  </form> -->
  <form action="" method="post">

    <?php
      if (empty($_POST['idModif']) || isset($_POST['Annuler'])) {
        echo $echo_nvl_Ent_Prop;
        echo '<label for="titre" class="col-sm-2 col-lg-1 align-top">Titre</label>
            <input type="text" name="titre" value="" class="col-sm-4 align-top border border-info" required>
            <br>
            <label for="contenu" class="col-sm-2 col-lg-1 align-top">Contenu</label>
            <textarea name="contenu" rows="10" class="col-sm-10 align-top border border-info"></textarea>
            <input type="submit" name="Creer" value="Créer la nvl entrée" class="offset-lg-1 col-sm-2 btn btn-outline-dark mt-1">';
      }
      else {
        if (isset($_POST['idModif'])) {
        $modif_Ent_Prop = $bdd->prepare('SELECT titre, contenu FROM propos WHERE id= :idSelect');
        $modif_Ent_Prop->execute(array(':idSelect'=>$_POST['idModif']));
        $row = $modif_Ent_Prop->fetch();
        echo "<p>Compléter les 2 champs suivants pour modifier l'entrée selectionnée :</p>";
        echo '<label for="titre" class="col-sm-2 col-lg-1 align-top">Titre</label>
            <input type="text" name="titre" value="'.$row["titre"].'" class="col-sm-4 align-top border border-info" required>
            <br>
            <label for="contenu" class="col-sm-2 col-lg-1 align-top">Contenu</label>
            <textarea name="contenu" rows="10" class="col-sm-10 align-top border border-info">'.$row["contenu"].'</textarea>
            <input type="submit" name="Modifier" value="Valider la modification" class="offset-lg-1 col-sm-2 btn btn-outline-dark mt-1">
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
  <p class="font-weight-bold">Contenu de la table "propos" :</p>
  <?php
    $sql = "SELECT * FROM propos ORDER BY id DESC";
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
      echo "<td><form action='' method='post'><input type='submit' name='". $_POST['idModif'] = $row['id'] . "' value='Modifier' class='btn btn-outline-dark'></form></td>";
      echo "<td><a href='suppr.php?idSuppr=" . $row['id'] . "' class='btn btn-outline-dark'>Supprimer</a></td></tr>"; // Bouton "Supprimer", voir la page "suppr.php"
    }
    echo "</tbody></table><hr>";
  ?>

</section>

<?php
} // fermeture du "else" en haut de page
  include "footer.php";
?>
