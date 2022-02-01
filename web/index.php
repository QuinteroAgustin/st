<?php $title = 'Accueil'; ob_start(); require './init.php';?>
<?php
  $slidershows = New SlidershowDAO();
  $slidershows = $slidershows->findAll();

  $posts = New PostDAO();
  $posts = $posts->findAll();

  $card_employees = New Card_employeeDAO();
  $card_employees = $card_employees->findAll();
?>
<div class="w3-panel">
  <h1><b><?= $title ?></b></h1>
  <p>Bienvenue chez ST- Service Technique, entreprise familiale</p>
  <a href="/views/admin/pannel.php">Admin</a>
</div>

<!-- Slideshow -->
<div class="w3-container">
  <?php
  foreach($slidershows as $slidershow){
    if($slidershow->get_active() == 1){
      echo '<div class="w3-display-container mySlides">';
        echo '<img src="/img/accueil/'.$slidershow->get_img().'" style="width:100%">';
        if($slidershow->get_display() != NULL){
          echo '<div class="w3-display-'.$slidershow->get_display().' w3-container w3-padding-32">';
            echo '<span class="w3-white w3-padding-large w3-animate-bottom">'.$slidershow->get_text().'</span>';
          echo '</div>';
        }
        
      echo '</div>';
    }
  }
  ?>  
  <!-- Slideshow next/previous buttons -->
  <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
    <div class="w3-left" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left w3-hover-text-teal"></i></div>
    <div class="w3-right" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right w3-hover-text-teal"></i></div>
    <div class="w3-center">
      <?php
      $i=0;
      foreach($slidershows as $slidershow){
        $i++;
        if($slidershow->get_active() == 1){
          echo '<span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv('.$i.')"></span>';
        }
      }
      ?>
    </div>
  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
<?php
foreach($posts as $post){
  if ($post->get_active() == 1) {
      echo '<div class="w3-row w3-padding-64" id="about">';
      if ($post->get_position_img() == 0) {
          echo '<div class="w3-col m6 w3-padding-large">';
          echo '<img src="/img/accueil/'.$post->get_img().'" class="w3-round w3-image w3-opacity-min" alt="Image post" width="600" height="750">';
          echo '</div>';
          echo '<div class="w3-col m6 w3-padding-large">';
          echo '<h1 class="w3-center">'.$post->get_title().'</h1><br>';
          echo '<h5 class="w3-center">'.$post->get_sub_title().'</h5>';
          echo '<p class="w3-large">'.$post->get_message().'</p>';
          echo '<p class="w3-large w3-text-grey w3-hide-medium">'.$post->get_sub_message().'</p>';
          echo '</div>';
      } else {
          echo '<div class="w3-col m6 w3-padding-large">';
          echo '<h1 class="w3-center">'.$post->get_title().'</h1><br>';
          echo '<h5 class="w3-center">'.$post->get_sub_title().'</h5>';
          echo '<p class="w3-large">'.$post->get_message().'</p>';
          echo '<p class="w3-large w3-text-grey w3-hide-medium">'.$post->get_sub_message().'</p>';
          echo '</div>';
          echo '<div class="w3-col m6 w3-padding-large">';
          echo '<img src="/img/accueil/'.$post->get_img().'" class="w3-round w3-image w3-opacity-min" alt="Image post" width="600" height="750">';
          echo '</div>';
      }
      echo '</div>';
  }
}
?>
<hr>
</div>
<!-- End page content -->


<!-- grille Qui somme nous ? -->
<div class="w3-row-padding" id="about">
  <div class="w3-center w3-padding-64">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Qui sommes nous</span>
  </div>
  <?php
  foreach($card_employees as $card_employee){
    if($card_employee->get_active() == 1){
      echo '<div class="w3-third w3-margin-bottom">';
        echo '<div class="w3-card-4">';
          echo '<img src="/img/accueil/'.$card_employee->get_img().'" alt="John" style="width:100%">';
          echo '<div class="w3-container">';
            echo '<h3>'.$card_employee->get_nom_prenom().'</h3>';
            echo '<p class="w3-opacity">'.$card_employee->get_role().'</p>';
            echo '<p>'.$card_employee->get_description().'</p>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    }
  }
  ?>
</div>
<!-- fin grille Qui somme nous ? -->

<!-- Js -->
<script src="/js/main.js"></script>
<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>