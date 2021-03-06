<?php $title = 'Moddifier une image'; ob_start(); require './../../init.php';?>
<?php
//On appele les objs qu'on utilise
$flash = New Flash();
$dao_slidershow = New SlidershowDAO();
$id=isset($_GET['id'])?$_GET['id']:null;
//test si id vide
if($id==null){
    $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite, l\'image n\'existe pas ou plus')->put();
    header('Location: ./reglages.php');
    exit;
}
//check si le message existe
$slidershow = $dao_slidershow->find($id);
if($slidershow == null){
    $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite, l\'image n\'existe pas ou plus')->put();
    header('Location: ./reglages.php');
    exit;
}


//variables
$text=isset($_POST['text'])?$_POST['text']:NULL;
$activer=isset($_POST['activer'])?$_POST['activer']:NULL;
$position=isset($_POST['position'])?$_POST['position']:NULL;
$file_name = null;
$submit = isset($_POST['submit'])?$_POST['submit']:NULL;

//tableau d'erreur
$messages = array();
//debut des vérifs
if ($submit) {
    if (empty(trim($text))) {
        $messages[] = "Le TEXTE est obligatoire.";
    }

    if (empty(trim($position))) {
        $messages[] = "La POSITION est obligatoire.";
    }

    if (!empty($_FILES['image']) && !empty($_FILES['image']['name'])) {
        if(unlink(ROOT.'/img/accueil/'.$slidershow->get_img())){
            $img = array(
                'nameFile' => $_FILES['image']['name'],
                'full_path' => $_FILES['image']['full_path'],
                'type' => $_FILES['image']['type'],
                'tmp_name' => $_FILES['image']['tmp_name'],
                'error' => $_FILES['image']['error'],
                'size' => $_FILES['image']['size'],
                'extension' => explode('.', $_FILES['image']['name'])
            );
            $extensions = ['png','jpg','jpeg','gif'];
            $type = ['image/png','image/jpg','image/jpeg','image/gif'];
            $max_siez = 2000000;
            if (in_array($img['type'], $type)) {
                if (count($img['extension']) <= 2 && in_array(strtolower(end($img['extension'])), $extensions)) {
                    if ($img['size'] <= $max_siez && $img['error'] == 0) {
                        $file_name = 'slider_'.uniqid().'.'.strtolower(end($img['extension']));
                        if (move_uploaded_file($img['tmp_name'], ROOT.'/img/accueil/'.$file_name)) {
                            $flash->set_title('Bravo !')->set_type('green')->add_messages('Images bien envoyée');
                        } else {
                            $messages[] = "Erreur lors de l'envoie de l'image.";
                        }
                    } else {
                        $messages[] = "L'image est trop volumineuse.";
                    }
                } else {
                    $messages[] = "Le Type de l'images n'est pas autorisée.";
                }
            } else {
                $messages[] = "Le Type de l'images n'est pas autorisée.";
            }
        }else{
            $file_name=$slidershow->get_img();
        }
    }
        

    //partie qui enregistre dans la bdd
    if (empty($messages) && !empty($file_name)) {
        if($activer!=null){
            $activer=1;
        }else{
            $activer=0;
        }
        $values = array(
            'id' => $slidershow->get_id(),
            'img' => $file_name,
            'active' => (int)$activer,
            'display' => $position,
            'text' => $text,
            'id_user' => 1
        );
        
        $obj_slidershow = New Slidershow($values);
        $dao_slidershow = $dao_slidershow->update($obj_slidershow);
        if($dao_slidershow == 1){
            $flash->set_title('Bravo !')->set_type('green')->add_messages('Image moddifié !')->put();
            header('Location: reglages.php');
        }else{
            $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite appeler un administrateur')->put();
            header('Location: /views/admin/immages_edit.php?id='.$slidershow->get_id());
        }
    }else{
        $flash->set_title('Bravo !')->set_type('red')->add_messages('Il vous faut choisir une image !')->put();
        header('Location: /views/admin/immages_edit.php?id='.$slidershow->get_id());
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
<!-- edit une image -->
<div class="w3-center w3-padding-64" id="contact">
  <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16"><?= $title ?></span>
</div>

  <form class="w3-container st-margin-bottom-26" action="<?php echo $_SERVER['PHP_SELF'].'?id='.$slidershow->get_id(); ?>" method='post' enctype="multipart/form-data">
    <div class="w3-section">
      <label>Texte</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="text" value="<?= $slidershow->get_text() ?>" required>
    </div>
    <div class="w3-section">
        <label>Position</label>
        <select class="w3-select w3-border w3-hover-border-black" name="position">
            <option value="topleft" <?php if($slidershow->get_display()=="topleft")echo'selected'; ?>>Haut gauche</option>
            <option value="topmiddle" <?php if($slidershow->get_display()=="topmiddle")echo'selected'; ?>>Haut milieu</option>
            <option value="topright" <?php if($slidershow->get_display()=="topright")echo'selected'; ?>>Haut droite</option>
            <option value="left" <?php if($slidershow->get_display()=="left")echo'selected'; ?>>Milieu gauche</option>
            <option value="middle" <?php if($slidershow->get_display()=="middle")echo'selected'; ?>>Milieu milieu</option>
            <option value="right" <?php if($slidershow->get_display()=="right")echo'selected'; ?>>Milieu droite</option>
            <option value="bottomleft" <?php if($slidershow->get_display()=="bottomleft")echo'selected'; ?>>Bas gauche</option>
            <option value="bottommiddle" <?php if($slidershow->get_display()=="bottommiddle")echo'selected'; ?>>Bas milieu</option>
            <option value="bottomright" <?php if($slidershow->get_display()=="bottomright")echo'selected'; ?>>Bas droite</option>
        </select>
    </div>
    <div class="w3-section">
        <label>Activer ?</label>
        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="checkbox" name="activer" <?php if($slidershow->get_active()!=null)echo 'checked="checked"' ?>>
    </div>
    <div class="w3-section">
      <label>Photo (Si besoin de changer l'image)</label>
      <input type='file' class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="image">
    </div>
    <input type="submit" class="w3-button w3-block w3-black" name='submit' value="Moddifier la photo">
  </form>
</div>
<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>