<?php $title = 'Contact'; ob_start(); require './../init.php';?>
<?php
//On appele les objs qu'on utilise
  $flash = New Flash();
  $dao_message = New MessageDAO();

//Par rapport a l'upload d'images

//Vérifie si des valeurs en post sont déjà saisie
  $nom = isset($_POST['nom'])?$_POST['nom']:NULL;
  $prenom = isset($_POST['prenom'])?$_POST['prenom']:NULL;
  $email = isset($_POST['email'])?$_POST['email']:NULL;
  $tel = isset($_POST['tel'])?(int)$_POST['tel']:NULL;
  $adresse = isset($_POST['adresse'])?$_POST['adresse']:NULL;
  $ville = isset($_POST['ville'])?$_POST['ville']:NULL;
  $cp = isset($_POST['cp'])?(int)$_POST['cp']:NULL;
  $subject = isset($_POST['subject'])?$_POST['subject']:NULL;
  $message = isset($_POST['message'])?$_POST['message']:NULL;
  $images_name = '';
  $submit = isset($_POST['submit'])?$_POST['submit']:NULL;
//tableau d'erreur
  $messages = array();
//debut des vérifs
  if($submit){
    if(empty(trim($nom))){
      $messages[] = "Le NOM est obligatoire.";
    }
    $nom = filter_var($nom, FILTER_UNSAFE_RAW);

    if(empty(trim($prenom))){
      $messages[] = "Le PRENOM est obligatoire.";
    }
    $prenom = filter_var($prenom, FILTER_UNSAFE_RAW);

    if(empty(trim($email))){
      $messages[] = "L'EMAIL est obligatoire.";
    }else{
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
          $messages[] = "L'EMAIL n'est pas un email valide.";
      }
    }

    if(empty(trim($tel))){
      $messages[] = "L'TELEPHONE est obligatoire.";
    }else{
      $tel = filter_var($tel, FILTER_SANITIZE_NUMBER_INT);
      if(filter_var($tel, FILTER_VALIDATE_INT) === false){
        $messages[] = "L'TELEPHONE n'est pas un numéro valide a.";
      }else{
        var_dump($tel);
        var_dump($_POST['tel']);
        if(strlen($tel) < 9){
          $messages[] = "L'TELEPHONE n'est pas un numéro valide b.";
        }
        if(strlen($tel) > 13){
          $messages[] = "L'TELEPHONE n'est pas un numéro valide c.";
        }
      }
    }

    if(empty(trim($adresse))){
      $messages[] = "L'ADRESSE est obligatoire.";
    }
    $adresse = filter_var($adresse, FILTER_UNSAFE_RAW);

    if(empty(trim($ville))){
      $messages[] = "La VILLE est obligatoire.";
    }
    $ville = filter_var($ville, FILTER_UNSAFE_RAW);

    if(empty(trim($cp))){
      $messages[] = "Le CODE POSTAL est obligatoire.";
    }else{
      $cp = filter_var($cp, FILTER_SANITIZE_NUMBER_INT);
      if(filter_var($cp, FILTER_VALIDATE_INT) === false){
        $messages[] = "L'CODE POSTAL n'est pas un numéro valide.";
        if(strlen($cp) < 5){
          $messages[] = "L'CODE POSTAL n'est pas un numéro valide.";
        }
        if(strlen($cp) > 5){
          $messages[] = "L'CODE POSTAL n'est pas un numéro valide.";
        }
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

    if(!empty($_FILES['imgs']) && !empty($_FILES['imgs']['name'][0])){
      if (count($_FILES['imgs']['name']) < 5 && count($_FILES['imgs']['name']) >= 1) {
        $imgs = array();
        for ($i=0;$i<count($_FILES['imgs']['name']);$i++) {
          $imgs[] = array(
          'nameFile' => $_FILES['imgs']['name'][$i],
          'full_path' => $_FILES['imgs']['full_path'][$i],
          'type' => $_FILES['imgs']['type'][$i],
          'tmp_name' => $_FILES['imgs']['tmp_name'][$i],
          'error' => $_FILES['imgs']['error'][$i],
          'size' => $_FILES['imgs']['size'][$i],
          'extension' => explode('.', $_FILES['imgs']['name'][$i])
          );
        }

        $extensions = ['png','jpg','jpeg','gif'];
        $type = ['image/png','image/jpg','image/jpeg','image/gif'];
        $max_siez = 2000000;
        foreach ($imgs as $img) {
          if (in_array($img['type'], $type)) {
            if (count($img['extension']) <= 2 && in_array(strtolower(end($img['extension'])), $extensions)) {
              if ($img['size'] <= $max_siez && $img['error'] == 0) {
                $file_name = uniqid().'.'.strtolower(end($img['extension']));
                $images_name .= $file_name.',';
                if (move_uploaded_file($img['tmp_name'], ROOT.'/img/'.$file_name)) {
                  $flash->set_title('Bravo !')->set_type('green')->add_messages('Images bien envoyée');
                } else {
                  $messages[] = "Erreur lors de l'envoie de l'image.";
                }
              } else {
                $messages[] = "Les images sont trop volumineuses.";
              }
            } else {
              $messages[] = "Le Type des images n'est pas autorisée.";
            }
          } else {
            $messages[] = "Le Type des images n'est pas autorisée.";
          }
        }
        $images_name = rtrim($images_name, ',');
      }else{
        $messages[] = "Vous ne pouvez envoyer que 5 images par messages.";
      }
    }

    //partie qui enregistre dans la bdd
    if(empty($messages)){
      $values = array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'tel' => $tel,
        'adresse' => $adresse,
        'ville' => $ville,
        'cp' => $cp,
        'subject' => $subject,
        'message' => $message,
        'imgs' => $images_name,
      );
      $obj_message = New Message($values);
      $dao_message = $dao_message->insert($obj_message);
      if($dao_message == 1){
        $flash->set_title('Bravo !')->set_type('green')->add_messages('Merci de nous avoir contactez votre demande sera traité dans les plus brefs délées')->put();
        header('Location: /index.php');
      }else{
        $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite appeler un administrateur')->put();
        header('Location: /contacter.php');
      }
    }
  }
?>

<?php
//affichage des erreurs
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

  <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' enctype="multipart/form-data">
    <div class="w3-section">
      <label>Nom</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="nom" value="<?= $nom ?>" required>
    </div>
    <div class="w3-section">
      <label>Prenom</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="prenom" value="<?= $prenom ?>" required>
    </div>
    <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="email" value="<?= $email ?>" required>
    </div>
    <div class="w3-section">
      <label>Téléphone ou Portable</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="number" name="tel" value="<?= $tel ?>" required>
    </div>
    <div class="w3-section">
      <label>Adresse</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="adresse" value="<?= $adresse ?>" required>
    </div>
    <div class="w3-section">
      <label>Ville</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="ville" value="<?= $ville ?>" required>
    </div>
    <div class="w3-section">
      <label>Code postal</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="number" name="cp" value="<?= $cp ?>" required>
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
      <input type='file' class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="imgs[]" multiple>
    </div>
    <input type="submit" class="w3-button w3-block w3-black" name='submit' value="Envoyer">
  </form>
</div>

<!-- Js -->
<script src="/js/main.js"></script>
<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>