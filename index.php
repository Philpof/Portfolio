<?php
include "header.php";
include "connexion.php";
?>

<!-- Section 1 A propos-->
<section id="section1" class="container-fluid">

  <!-- Titre -->
  <h1 id="titre" class="text-light col-sm-12">Philippe Perechodov</h1>
  <h5 id="sstitre" class="text-light font-italic col-sm-12">- Developpeur Web -</h5>

  <!-- Navbar -->
  <div id="navbar" class="icon-bar col-sm-12 offset-xl-6 col-xl-6 d-flex flex-column">
    <a href="#section1" class="effetBar">A propos</a>
    <a href="#section2" class="effetBar">Projets & Réalisations</a>
    <a href="adminSQL.php" class="effetBar">Articles</a>
    <a href="#section4" class="effetBar">Contact</a>
  </div>

  <!-- Qui suis-le ?-->
  <div class="row">
    <img id="photo" class="col-sm-7 col-md-5 col-lg-2 text-white" src="img/PhotoCV.png" alt="Photo ">
    <div id="qui" class="col-sm-10 col-md-10 col-lg-8 ml-sm-5 ml-lg-0 text-light text-justify">
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
    <div class="progress-bar" id="progressBarB"></div>
    <div class="progress-bar" id="progressBarC"></div>
  </div>

</section>

<!-- Ancienne Section 2 Projets-->
<!-- <div id="section2" class="container-fluid text-light">
  <div id="sectTitre" class="row">
    <p class="col-sm-4 ml-5 mt-5 p-3 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <h2 class="text-right col-sm-7 mt-3 pr-5">Projets & Réalisations</h2>
  </div>

  <div class="angle one"></div>
  <div class="angle two"></div>
  <div class="angle three"></div>
  <div class="angle four"></div>

  <div id="retour" class="icon-bar col-sm-8 d-flex flex-column container-fluid">
    <a href="#section1" id="retourText" class="effetBar">Revenir en haut de la page</a>
  </div>
</div>

<div class="progress" id="progress">
  <div class="progress-bar" id="progressBarD" ></div>
  <div class="progress-bar" id="progressBarB"></div>
  <div class="progress-bar" id="progressBarF"></div>
</div> -->


<!-- Section 2 : Projets & Réalisations -->
<div id="section2" class="container-fluid text-light">
  <h2 class="text-left pl-5 pt-3 ">Projets & Réalisations</h2>
  <div class="projets">
    <div class="box">
      <img src="img/Faun.png">
      <span>Template Faun</span>
    </div>
    <div class="box">
      <img src="img/Breakfast.png">
      <span>Template Breakfast</span>
    </div>
    <div class="box">
      <img src="img/Explorateur.png">
      <span>Explorateur de fichiers</span>
    </div>
    <a href="noWay.php" class="box">
      <img src="img/BomberLink.png">
      <span>BomberLink</span>
    </a>
  </div>

  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarA" ></div>
    <div class="progress-bar" id="progressBarE"></div>
    <div class="progress-bar" id="progressBarF"></div>
  </div>

</div>


<!-- Section 3 : Articles-->

<!-- Section 4 : Contact-->
<div id="section4" class="container-fluid text-light">
  <h2 id="contacts" class="text-left pl-5 pt-3 ">Contact</h2>


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
      <p class="pb-3 col-sm-12 text-center font-italic">- Developpeur Web -</p>
      <p class="pb-3 col-sm-12 text-center ">06 26 64 84 91</p>
      <a href="mailto:philippe.perechodov@free.fr" class="text-light">philippe.perechodov@free.fr</a>
    </div>
    <div class="m-3 row d-flex justify-content-center">
      <a id="clic" class="m-3" href="https://github.com/Philpof" target="_blank"><img class="logoGithub" src="img/github.png" alt="GitHub"><img class="logoGithub" src="img/githubRed.png" alt="GitHub"></a>
      <a id="clic" class="m-3" href="https://www.linkedin.com/in/philippe-perechodov/" target="_blank"><img class="logoLinkedin" src="img/linkedin.png" alt="LinkedIn"><img class="logoLinkedin" src="img/linkedinRed.png" alt="LinkedIn"></a>
    </div>
    <p>© Tous droits réservés - 2020</p>
  </div>
</section>

<?php
include "footer.php";
