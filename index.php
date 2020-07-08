<?php
include "header.php";
?>

<!-- Section 1 A propos-->
<section>
  <div id="section1" class="container-fluid pb-5">

    <h1 class="text-light" id="titre">Philippe Perechodov</h1>
    <p id="sstitre" class="text-light">Developpeur Web</p>

    <!-- Navbar -->
    <ul class="nav nav-pills">
        <a class="nav-link text-light" href="index.php#section1">A propos</a>
        <a class="nav-link text-light" href="index.php#section2">Projets</a>
        <a class="nav-link text-light" href="index.php#section3">Articles</a>
        <a class="nav-link text-light" href="index.php#section4">Contact</a>
    </ul>

    <!-- Qui suis-le ?-->
    <div class="row">
      <img id="photo" class="col-sm-7 col-md-5 col-lg-2 m-5 text-white" src="img/PhotoCV.png" alt="Photo ">
      <div id="qui" class="col-sm-10 col-md-10 col-lg-5 col-xl-5 pb-5 px-3 ml-sm-5 ml-lg-0 text-light text-justify">
        <h3>Qui suis-je ?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="m-3 row d-flex">
          <a id="clic" class="mx-3" href="https://github.com/Philpof" target="_blank"><img class="logoGithub" src="img/github.png" alt="GitHub"><img class="logoGithub" src="img/githubRed.png" alt="GitHub"></a>
          <a id="clic" class="mx-3" href="https://www.linkedin.com/in/philippe-perechodov/" target="_blank"><img class="logoLinkedin" src="img/linkedin.png" alt="LinkedIn"><img class="logoLinkedin" src="img/linkedinRed.png" alt="LinkedIn"></a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="progress" id="progress">
  <div class="progress-bar" id="progressBarA" ></div>
  <div class="progress-bar" id="progressBarB"></div>
  <div class="progress-bar" id="progressBarC"></div>
</div>

<!-- Section 2 Projets-->
<div id="section2" class="container-fluid text-light">
  <h2 class="text-right pr-5 pt-3 ">Projets & Réalisations</h2>
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
    <div class="box">
      <img src="img/BomberLink.png">
      <span>BomberLink</span>
    </div>
  </div>
</div>

<div class="progress" id="progress">
  <div class="progress-bar" id="progressBarD" ></div>
  <div class="progress-bar" id="progressBarE"></div>
  <div class="progress-bar" id="progressBarF"></div>
</div>

  <!-- Section 3 : Articles -->
  <div id="section3" class="container-fluid text-light">
    <h2 class="text-left pl-5 pt-3 ">Articles</h2>
    <div class="angle one"></div>
    <div class="angle two"></div>
    <div class="angle three"></div>
    <div class="angle four"></div>
  </div>
  <div class="progress" id="progress">
    <div class="progress-bar" id="progressBarG" ></div>
    <div class="progress-bar" id="progressBarH"></div>
    <div class="progress-bar" id="progressBarI"></div>
  </div>

  <!-- Section 4 : Contact-->
  <div id="section4" class="container-fluid">



  </div>


<!-- Footer -->
<section>
  <div id="footer" class="container-fluid text-center text-light pt-3 pb-3">
    <div>
      <a href="#section1" class="btn text-light" id="phil">Philippe Perechodov</a>
      <p class="pb-3">Developpeur Web</p>
    </div>
    <div class="m-3 row d-flex justify-content-center">
      <a id="clic" class="mx-3" href="https://github.com/Philpof" target="_blank"><img class="logoGithub" src="img/github.png" alt="GitHub"><img class="logoGithub" src="img/githubRed.png" alt="GitHub"></a>
      <a id="clic" class="mx-3" href="https://www.linkedin.com/in/philippe-perechodov/" target="_blank"><img class="logoLinkedin" src="img/linkedin.png" alt="LinkedIn"><img class="logoLinkedin" src="img/linkedinRed.png" alt="LinkedIn"></a>
    </div>
    <p>© Tous droits réservés - 2020</p>
  </div>
</section>

<?php
include "footer.php";
