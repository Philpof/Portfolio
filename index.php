<?php
include "header.php";
include "connexion.php";

// Envoi d'un email si le formulaire est correctement rempli + affichage messages confirmation ou erreur + envoi mail dans base de donnée MySQL
  // Affiche le message de confirmation si l'email a déjà été envoyé
  if(isset($_GET['action']) && $_GET['action'] == "ok"){
    $emailEnvoi = "<div class='alert alert-success mt-4' role='alert'>Votre message a bien été envoyé !</div>";
  }
  elseif(!isset($_GET['action']) || $_GET['action'] != "ok"){

    // Contrôle pour voir si les champs sont tous remplis
    if (!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['message'])) {

      // Les variables
      $dest = 'p.perechodov@codeur.online'; //'p.perechodov@codeur.online';
      $sujet = 'Via "Contact" - Message de ' . htmlspecialchars($_POST['nom']); //permet d'échapper les balises et autres scripts
      $headers = 'From:' . $_POST['mail'] .'';
      $message = htmlspecialchars($_POST["message"]);
      // Envoi de l'email
      if(mail($dest, $sujet, $message, $headers)) {
        // Le mail va dans la base de donnée MySQL
        try {
          $nvl_Ent_Cont = $db->prepare('INSERT INTO contacts (nom, mail, message) VALUES (:nom, :mail, :message)');
          $nvl_Ent_Cont->execute(array(
            ':nom' => $_POST['nom'],
            ':mail' => $_POST['mail'],
            ':message' => nl2br($_POST['message'])
          ));
        } catch (\Exception $e) {
          echo $e->getMessage();
        }

        // Refresh de la page avec ancre sur "Contact"
        header("Location: index.php?action=ok#section4");
      }
      // Message d'erreur si le mail n'a pas pu être envoyé
      else {
        $emailEnvoi = "<div class='alert alert-danger mt-4' role='alert'>Echec de l'envoie du message, veuillez réessayer ultérieurement ou adresser votre email à <a href='mailto:philippe.perechodov@free.fr'>p.perechodov@codeur.online</a></div>";
      }
    }
  }
?>


<!-- Section 1 A propos-->
<section id="section1" class="container-fluid">

  <div class="row justify-content-between">
    <a href="login.php" id="admin" class="ml-2">| Administration |</a>

    <div class=" btn-lg dropdown">
      <button type="button" id="drop" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <!-- Dropdown menu links -->
        <div id="icon-bar" class="icon-bar d-flex flex-column">
          <a id="liens" href="#section1" class="effetBar">A propos</a>
          <a id="liens" href="#section2" class="effetBar">Projets & Réalisations</a>
          <a id="liens" href="#section3" class="effetBar">Articles</a>
          <a id="liens" href="#section4" class="effetBar">Contact</a>
        </div>
      </div>
    </div>



  </div>
  <div class="row">
      <!-- Titre -->
    <h1 id="titre" class="text-light col-sm-12">Philippe Perechodov</h1>
    <h5 id="sstitre" class="text-light font-italic col-sm-12">- Developpeur Web -</h5>
  </div>

  <!-- Qui suis-je ?-->
  <div class="row">
    <img id="photo" class="col-sm-7 col-md-5 col-lg-2 text-white" src="img/PhotoCV.png" alt="Photo ">
    <div id="qui" class="col-sm-10 col-lg-6 text-light text-justify">
      <h3>Qui suis-je ?</h3>
      <p>
        <!-- SQL : Pour afficher la dernière entrée du champ "contenu" de la base de données -->
        <?php
          echo $lastPropos['contenu'];
        ?>
      </p>
      <div class="m-2 row d-flex">
        <a id="clic" class="mx-3" href="https://github.com/Philpof" target="_blank"><img class="logoGithub" src="img/github.png" alt="GitHub"><img class="logoGithub" src="img/githubRed.png" alt="GitHub"></a>
        <a id="clic" class="mx-3" href="https://www.linkedin.com/in/philippe-perechodov/" target="_blank"><img class="logoLinkedin" src="img/linkedin.png" alt="LinkedIn"><img class="logoLinkedin" src="img/linkedinRed.png" alt="LinkedIn"></a>
      </div>
    </div>
  </div>

  <!-- Ligne séparation -->
  <div id="progress" class="progress">
    <div class="progress-bar" id="progressBarA" ></div>
    <div class="progress-bar" id="progressBarE"></div>
    <div class="progress-bar" id="progressBarF"></div>
  </div>

</section>


<!-- Section 2 : Projets & Réalisations -->
<div id="section2" class="container-fluid text-light">
  <h2 class="text-left pl-5 pt-3">Projets & Réalisations</h2>
  <div id="projets">

  </div>

  <!-- Ligne séparation -->
  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarC" ></div>
    <div class="progress-bar" id="progressBarB"></div>
    <div class="progress-bar" id="progressBarA"></div>
  </div>

</div>


<!-- Section 3 : Articles-->

<div id="section3" class="container-fluid text-light">
  <h2 class="text-right pr-5 pt-3 ">Articles</h2>
  <div id="articles">
    <a href="article.php" class="box">
      <img src="img/Faun.png">
      <span>Intégration Faun</span>
    </a>
    <a href="article.php" class="box">
      <img src="img/Breakfast.png">
      <span>Intégration Breakfast</span>
    </a>
    <a href="article.php" class="box">
      <img src="img/Explorateur.png">
      <span>Explorateur de fichiers</span>
    </a>
    <a href="article.php" class="box">
      <img src="img/BomberLink.png">
      <span>BomberLink</span>
    </a>
  </div>

  <!-- Ligne séparation -->
  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarA" ></div>
    <div class="progress-bar" id="progressBarB"></div>
    <div class="progress-bar" id="progressBarC"></div>
  </div>

</div>

<!-- Section 4 : Contact-->
<div id="section4" class="container-fluid text-light">
  <h2 class="text-left pl-5 pt-3 ">Contact</h2>
  <div class="container justify-content-center">

    <p class="text-center">Vous pouvez me contacter par le formulaire ci-dessous.</p>

    <!-- Formulaire de contact -->
    <form action="index.php" method="post">
      <label for="nom" class="col-lg-1 align-top pt-2">Nom</label>
      <input type="text" name="nom" placeholder="Votre nom" class="col-lg-4 align-top mt-2" required>
      <br>
      <label for="mail" class="col-lg-1 align-top pt-2">Mail</label>
      <input type="email" name="mail" placeholder="Votre mail" class="col-lg-8 align-top mt-2" required pattern=".*@.*[.].*"></input>
      <br>
      <label for="message" class="col-lg-1 align-top pt-2">Message</label>
      <textarea name="message" rows="5" placeholder="Votre message" class="col-lg-10 align-top mt-2" required></textarea>
      <div class="row justify-content-around">
        <input type="choose" name="guitare" pattern="guitare" placeholder="Anti-spam : Tapez le mot 'guitare' ici" class="col-sm-8 col-lg-4 align-top mt-3" required>
        <button type="submit" name="envoyerMail" class="btn btn-outline-light col-sm-8 col-lg-2 mt-3">Envoyer l'email</button>
      </div>
    </form>
    <?php
    // Affiche le message défini plus haut relatif à l'envoi de mail ou à son échec
      if (isset($emailEnvoi)) {
        echo $emailEnvoi;
      }
    ?>
    <p class="text-center mt-3">Merci de votre visite et à bientôt !</p>
  </div>

  <!-- Ligne séparation -->
  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarB" ></div>
    <div class="progress-bar" id="progressBarG"></div>
    <div class="progress-bar" id="progressBarB"></div>
  </div>

</div>


<!-- Footer -->
<!-- <section>
  <div id="footer" class="container-fluid text-center text-light pt-3 pb-3">
    <div>
      <div class="icon-bar no-wrap col-sm-12 d-flex flex-column container-fluid justify-content-center">
        <a href="#section1" id="phil" class="effetBar">Philippe Perechodov</a>
      </div>
      <p id="dev" class="pb-3 col-sm-12 offset-lg-2 col-lg-10 text-center font-italic">- Developpeur Web -</p>
    </div>
    <div class="m-2 row d-flex justify-content-center">
      <a id="clic" class="m-3" href="https://github.com/Philpof" target="_blank"><img class="logoGithub" src="img/github.png" alt="GitHub"><img class="logoGithub" src="img/githubRed.png" alt="GitHub"></a>
      <a id="clic" class="m-3" href="https://www.linkedin.com/in/philippe-perechodov/" target="_blank"><img class="logoLinkedin" src="img/linkedin.png" alt="LinkedIn"><img class="logoLinkedin" src="img/linkedinRed.png" alt="LinkedIn"></a>
    </div>
    <a href="mailto:philippe.perechodov@free.fr" class="text-light m-3">p.perechodov@codeur.online</a>
    <p class="m-3">Site réalisé en HTML - CSS - PHP - MySQL</p>
    <p class="m-3">Juillet 2020</p>
  </div>
</section> -->

<?php
include "footer.php";
