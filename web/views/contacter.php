<?php $title = 'Contact'; ob_start(); require './../init.php';?>
<?php
//On appele les objs qu'on utilise
  $flash = New Flash();
  $dao_message = New MessageDAO();

//Vérifie si des valeurs en post sont déjà saisie
  $nom = isset($_POST['nom'])?$_POST['nom']:NULL;
  $email = isset($_POST['email'])?$_POST['email']:NULL;
  $subject = isset($_POST['subject'])?$_POST['subject']:NULL;
  $message = isset($_POST['message'])?$_POST['message']:NULL;
  $imgs = isset($_POST['imgs'])?$_POST['imgs']:NULL;
  $submit = isset($_POST['submit'])?$_POST['submit']:NULL;
//tableau d'erreur
  $messages = array();
//debut des vérifs
  if($submit){
    if(empty(trim($nom))){
      $messages[] = "Le NOM est obligatoire.";
    }
    $nom = filter_var($nom, FILTER_UNSAFE_RAW);

    if(empty(trim($email))){
      $messages[] = "L'EMAIL est obligatoire.";
    }else{
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
          $messages[] = "L'EMAIL n'est pas un email valide.";
      }
    }

    if(empty(trim($subject))){
      $messages[] = "Le SUJET est obligatoire.";
    }else{
      $subject = filter_var($subject, FILTER_UNSAFE_RAW);
      if(strlen($subject) < 5){
        $messages[] = "Le SUJET doit contenir au moins 5 caractères.";
      }
    }

    if(empty(trim($message))){
      $messages[] = "Le MESSAGE est obligatoire.";
    }else{
      $message = filter_var($message, FILTER_UNSAFE_RAW);
      if(strlen($message) < 5){
        $messages[] = "Le MESSAGE doit contenir au moins 5 caractères.";
      }
    }

    if(empty($messages)){
      $values = array(
        'nom' => $nom,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'imgs' => $img,
      );
      $obj_message = New Message($values);
      //$dao_message = $dao_message->insert($obj_message);
      $flash->set_title('Bravo !')->set_type('green')->add_messages('Merci de nous avoir contactez votre demande sera traité dans les plus brefs délées')->put();
      header('Location: /index.php');
    }
  }
  
  
?>

<?php
$msg ='';
if (count($messages) > 0) {
  $msg .= '<div class="w3-panel w3-red w3-display-container w3-round-xlarge">';
  $msg .= "<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-button w3-display-topright w3-round-xlarge\">&times;</span>";
  $msg .= '<h3>Erreur !</h3>';
  $msg .= '<ul>';
  foreach ($messages as $a) {
      $msg .= '<li>'.$a.'</li>';
  }
  $msg .= '</ul>';
  $msg .= '</div>';
  echo $msg;
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
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="nom" value="<?= $nom ?>" required>
    </div>
    <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="email" value="<?= $email ?>" required>
    </div>
    <div class="w3-section">
      <label>Sujet</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="subject" value="<?= $subject ?>" required>
    </div>
    <div class="w3-section">
      <label>Message</label>
      <textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="message" required><?= $message ?></textarea>
    </div>
    <div class="w3-section">
      <label>Photo</label>
      <input type='file' class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="imgs">
    </div>
    <input type="submit" class="w3-button w3-block w3-black" name='submit' value="Envoyer">
  </form>
</div>

<!-- Js -->
<script src="/js/main.js"></script>
<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>