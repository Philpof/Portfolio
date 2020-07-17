<?php
include "header.php";
include "connexion.php";
?>

<!-- Section 1 A propos-->
<section id="section1" class="container-fluid">

  <div id="admin">
    <a href="adminSQL.php" class="d-flex justify-content-end">| Administration |</a>
  </div>
  <div class="row">
      <!-- Titre -->
    <h1 id="titre" class="text-light col-sm-12">Philippe Perechodov</h1>
    <h5 id="sstitre" class="text-light font-italic col-sm-12">- Developpeur Web -</h5>

    <!-- Navbar -->
    <div id="navbar" class="icon-bar col-sm-12 offset-lg-6 col-lg-6 d-flex flex-column">
      <a id="liens" href="#section1" class="effetBar">A propos</a>
      <a id="liens" href="#section2" class="effetBar">Projets & Réalisations</a>
      <a id="liens" href="#section3" class="effetBar">Articles</a>
      <a id="liens" href="#section4" class="effetBar">Contact</a>
    </div>
  </div>

  <!-- Qui suis-le ?-->
  <div class="row">
    <img id="photo" class="col-sm-7 col-md-5 col-lg-2 text-white" src="img/PhotoCV.png" alt="Photo ">
    <div id="qui" class="col-sm-10 col-md-10 col-xl-6 text-light text-justify">
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
  <h2 class="text-right pr-5 pt-3 ">Projets & Réalisations</h2>
  <div class="projets">
    <a href="noWay.php" class="box">
      <img src="img/Faun.png">
      <span>Template Faun</span>
    </a>
    <a href="noWay.php" class="box">
      <img src="img/Breakfast.png">
      <span>Template Breakfast</span>
    </a>
    <a href="noWay.php" class="box">
      <img src="img/Explorateur.png">
      <span>Explorateur de fichiers</span>
    </a>
    <a href="noWay.php" class="box">
      <img src="img/BomberLink.png">
      <span>BomberLink</span>
    </a>
  </div>

  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarA" ></div>
    <div class="progress-bar" id="progressBarB"></div>
    <div class="progress-bar" id="progressBarC"></div>
  </div>

</div>


<!-- Section 3 : Articles-->

<!-- Section 4 : Contact-->
<div id="section4" class="container-fluid text-light">
  <h2 class="text-right pr-5 pt-3 ">Contact</h2>
  <div class="container justify-content-center">

    <p class="text-center mb-5">Vous pouvez me contacter par le formulaire ci-dessous.</p>

    <?php
      if (!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['message'])) {
        try {
          $nvl_Ent_Cont = $bdd->prepare('INSERT INTO contacts (nom, mail, message) VALUES (:nom, :mail, :message)');
          $nvl_Ent_Cont->execute(array(
            ':nom' => $_POST['nom'],
            ':mail' => $_POST['mail'],
            ':message' => $_POST['message']
          ));
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
      }
    ?>

    <!-- Formulaire de contact -->
    <form action="index.php" method="post">
      <label for="nom" class="col-sm-2 col-lg-1 align-top pt-2">Nom</label>
      <input type="text" name="nom" placeholder="Votre nom" class="col-sm-4 align-top mt-2" required>
      <br>
      <label for="mail" class="col-sm-2 col-lg-1 align-top pt-1">Mail</label>
      <input type="email" name="mail" placeholder="Votre mail (x@x.x)" class="col-sm-10 align-top pt-1" required pattern=".*@.*[.].*"></input>
      <br>
      <label for="message" class="col-sm-2 col-lg-1 align-top pt-1">Message</label>
      <textarea name="message" rows="5" placeholder="Votre message" class="col-sm-10 align-top pt-1" required></textarea>
      <button type="submit" class="btn btn-outline-light offset-sm-8 offset-lg-9 col-sm-2 mt-3">Envoyer</button>
    </form>

    <p class="text-center mt-5 mb-5">Merci de votre visite et à bientôt !</p>

  </div>

  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarB" ></div>
    <div class="progress-bar" id="progressBarH"></div>
    <div class="progress-bar" id="progressBarB"></div>
  </div>

</div>


<!-- Footer -->
<section>
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
    <a href="mailto:philippe.perechodov@free.fr" class="text-light m-3">philippe.perechodov@free.fr</a>
    <p class="m-3">© Tous droits réservés - 2020</p>

  </div>
</section>

<?php
include "footer.php";
