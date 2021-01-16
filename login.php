<?php
  include "connexion.php";
  $sql = "SELECT * FROM users WHERE id = '1'";
  foreach  ($db->query($sql) as $row) {
  }


  define('LOGIN', $row['login']);
  define('PASSWORD', $row['mdp']);

  // Test de l'envoi du formulaire
  if (!empty($_POST['password']))
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['password']))
    {
      // Sont-ils les mêmes que les constantes ?
      if(!password_verify($_POST['password'], PASSWORD))
      {
        $password_KO = "<div class='alert alert-danger mt-5' role='alert'>Mot de passe incorrect !</div>";
      }
        else
      {
        // On ouvre la session
        session_start();

        // On enregistre le login en session
        $_SESSION['login'] = LOGIN;

        // On redirige vers le fichier admin.php
        header('Location: adminSQL.php');
        exit();
      }
    }
      else
    {
      echo "<div class='alert alert-info mt-5' role='alert'>Indiquez le mot de passe pour accéder à la page d'administration du site</div>";;
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Philippe PERECHODOV">
  <title>Formulaire d'authentification</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section class="container bg-light pt-5 pb-5">
    <h1 class="text-center">Login</h1>

    <hr>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <label for="password" class="col-sm-12 col-lg-2 align-top">Mot de passe :</label>
      <input type="password" name="password" id="password" class="col-sm-4 align-top border border-info" required>

      <input type="submit" name="submit" value="Valider" class="offset-lg-1 col-sm-2">
    </form>

    <?php
      // Rencontre-t-on une erreur ?
      if(!empty($password_KO))
      {
        echo $password_KO;
      }
    ?>

    <hr>
    <a href="index.php">Revenir au site</a>
    <hr>
    <br>
    <br>
    <br>
    <br>
    <br>

</section>

<?php
include "footer.php";
?>
