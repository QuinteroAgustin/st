<?php $title = 'Contact'; ob_start(); require './../init.php';?>
<?php
  $nom = isset($_POST['nom'])?$_POST['nom']:NULL;
  $email = isset($_POST['email'])?$_POST['email']:NULL;
  $sujet = isset($_POST['sujet'])?$_POST['sujet']:NULL;
  $message = isset($_POST['message'])?$_POST['message']:NULL;
  $imgs = isset($_POST['imgs'])?$_POST['imgs']:NULL;
  
  if(isset($_POST['submit'])){
    $flash = New Flash();
    $flash->set_title('Bravo !')->set_type('green')->add_messages('Vous vous êtes bien inscrit : test')->put();
    
  }
  
  
?>
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

  <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
    <div class="w3-section">
      <label>Nom</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="nom" required>
    </div>
    <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="email" required>
    </div>
    <div class="w3-section">
      <label>Sujet</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="sujet" required>
    </div>
    <div class="w3-section">
      <label>Message</label>
      <textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="message" required></textarea>
    </div>
    <div class="w3-section">
      <label>Photo</label>
      <input type='file' class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="imgs" required>
    </div>
    <button type="submit" class="w3-button w3-block w3-black" name='submit'>Envoyer</button>
  </form>
</div>

<!-- Js -->
<script src="/js/main.js"></script>
<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>