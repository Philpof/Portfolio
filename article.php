<?php
include "header.php";
include "connexion.php";
?>

<!-- Section 1 A propos-->
<section id="article" class="container-fluid">
  <div id="admin">
    <a href="index.php" class="d-flex justify-content-end">| Retour à l'accueil |</a>
  </div>
  <div class="row">
      <!-- Titre -->
    <h1 id="titreArticle" class="text-light col-sm-12 text-center mb-5 pb-5 mt-5">- TITRE DE L'ARTICLE (PHP) -</h1>
  </div>

  <div class="row">
    <img id="photoArticle" class="col-sm-7 col-md-5 col-lg-2 text-white" src="img/chat.jpeg" alt="Photo Article ">
    <div id="qui" class="col-sm-10 col-md-10 col-xl-6 text-light text-justify">
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
</section>

  <!-- Ligne séparation -->
  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarB" ></div>
    <div class="progress-bar" id="progressBarG"></div>
    <div class="progress-bar" id="progressBarB"></div>
  </div>

<!-- Bas de page -->
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
