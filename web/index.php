<?php $title = 'Accueil'; ob_start(); require './init.php'; ?>

<div class="w3-panel">
    <h1><b><?= $title ?></b></h1>
    <p>Bienvenue chez ST- Service Technique, entreprise familiale</p>
  </div>

<!-- Slideshow -->
<div class="w3-container">
    <div class="w3-display-container mySlides">
      <img src="/img/accueil.jpg" style="width:100%">
      <div class="w3-display-topleft w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">Chauffage</span>
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="/img/clim.jpg" style="width:100%">
      <div class="w3-display-middle w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">Climatisation</span>
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="/img/froid.jpg" style="width:100%">
      <div class="w3-display-topright w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">Froid</span>
      </div>
    </div>

    <!-- Slideshow next/previous buttons -->
    <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
      <div class="w3-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left w3-hover-text-teal"></i></div>
      <div class="w3-right" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right w3-hover-text-teal"></i></div>
    
      <div class="w3-center">
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
      </div>
    </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large">
     <img src="/img/accueil.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About Catering</h1><br>
      <h5 class="w3-center">Tradition since 1889</h5>
      <p class="w3-large">The Catering was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.We only use  ingredients.</p>
      <p class="w3-large w3-text-grey w3-hide-medium">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our Menu</h1><br>
      <h4>Bread Basket</h4>
      <p class="w3-text-grey">Assortment of fresh baked fruit breads and muffins 5.50</p><br>
    
      <h4>Honey Almond Granola with Fruits</h4>
      <p class="w3-text-grey">Natural cereal of honey toasted oats, raisins, almonds and dates 7.00</p><br>
    
      <h4>Belgian Waffle</h4>
      <p class="w3-text-grey">Vanilla flavored batter with malted flour 7.50</p><br>
    
      <h4>Scrambled eggs</h4>
      <p class="w3-text-grey">Scrambled eggs, roasted red pepper and garlic, with green onions 7.50</p><br>
    
      <h4>Blueberry Pancakes</h4>
      <p class="w3-text-grey">With syrup, butter and lots of berries 8.50</p>    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="/img/froid.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
  </div>

  <hr>
  
<!-- End page content -->
</div>



<!-- Grid -->
<div class="w3-row-padding" id="about">
    <div class="w3-center w3-padding-64">
      <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Qui sommes nous</span>
    </div>

    <div class="w3-third w3-margin-bottom">
      <div class="w3-card-4">
        <img src="/img/team3.jpg" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>José Quintero</h3>
          <p class="w3-opacity">Président & fondateur</p>
          <p>C'est moi l'expert en charge des chantiers et résolution de vos problèmes</p>
        </div>
      </div>
    </div>

    <div class="w3-third w3-margin-bottom">
      <div class="w3-card-4">
        <img src="/img/team2.jpg" alt="Mike" style="width:100%">
        <div class="w3-container">
          <h3>Agustin Quintero</h3>
          <p class="w3-opacity">Responsable informatique</p>
          <p>Fils de Mr Quintero, je suis le responsable des systèmes informatiques de l'entreprise et développeur des applications web</p>
        </div>
      </div>
    </div>

    <div class="w3-third w3-margin-bottom">
      <div class="w3-card-4">
        <img src="/img/team1.jpg" alt="Jane" style="width:100%">
        <div class="w3-container">
          <h3>Sylvia Quintero</h3>
          <p class="w3-opacity">Service comptable</p>
          <p>La responsable du service comptablilité </p>
        </div>
      </div>
    </div>
  </div>

<!-- Js -->
<script src="/js/main.js"></script>
<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>