<?php $title = 'Contacte'; ob_start(); require './../init.php'; ?>

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

<!-- Contact -->
<div class="w3-center w3-padding-64" id="contact">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Nous contacter</span>
  </div>

  <form class="w3-container" action="/action_page.php" target="_blank">
    <div class="w3-section">
      <label>Nom</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Name" required>
    </div>
    <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="Email" required>
    </div>
    <div class="w3-section">
      <label>Sujet</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Subject" required>
    </div>
    <div class="w3-section">
      <label>Message</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="Message" required>
    </div>
    <button type="submit" class="w3-button w3-block w3-black">Envoyer</button>
  </form>
</div>

<!-- Js -->
<script src="/js/main.js"></script>
<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>