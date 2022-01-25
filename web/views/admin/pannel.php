<?php $title = 'Menu Administrateur'; ob_start(); require './../../init.php';?>

<div class="w3-panel">
  <h1><b><?= $title ?></b></h1>
  <p>Bienvenue chez ST- Service Technique, entreprise familiale</p>
</div>
<!-- Slideshow -->
<div class="w3-container">


</div>
<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>