<?php
include "header.php";
?>

<section class="container">

  <h1 class="text-center">Login</h1>
  <hr>

  <?php

    if (!isset($_POST['login'])) {
      echo "<div class='alert alert-info mt-5' role='alert'>Indiquez le mot de passe pour accéder à la page d'administration du site</div>";
    }

  ?>
  <form class="" action="adminSQL.php" method="post">
    <label for="login" class="col-sm-12 col-lg-2 align-top">Mot de passe</label>
    <input type="password" name="login" class="col-sm-4 align-top" required>

    <input type="submit" value="Valider" class="offset-lg-1 col-sm-2">
  </form>



  <hr>
  <a href="index.php">Revenir au site</a>
  <hr>

</section>

<?php
include "footer.php";
?>
