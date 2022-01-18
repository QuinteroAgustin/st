<?php $title = 'Contacte'; ob_start(); require './../init.php'; ?>

<div class="w3-panel">
    <h1><b><?= $title ?></b></h1>
    <p>Bienvenue chez ST- Service Technique, entreprise familiale</p>
  </div>

<!-- Slideshow -->
<div class="w3-container">
    <div class="w3-display-container mySlides">
      <img src="/img/banniere.png" style="width:100%">
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