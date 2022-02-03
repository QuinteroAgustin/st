<?php $title_p = 'Moddifier un post'; ob_start(); require './../../init.php';?>
<?php
//On appele les objs qu'on utilise
$flash = New Flash();
$dao_post = New PostDAO();

//recupération de l'id
$id=isset($_GET['id'])?$_GET['id']:null;

//check si le post a un id
if($id==null){
    $flash->set_title('Erreur ! #00004')->set_type('red')->add_messages('Une erreur c\'est produite, votre post n\'existe pas ou plus')->put();
    header('Location: ./reglages.php');
    exit;
}
//check si le post existe
$post = $dao_post->find($id);
if($post == null){
    $flash->set_title('Erreur ! #00003')->set_type('red')->add_messages('Une erreur c\'est produite, votre post n\'existe pas ou plus')->put();
    header('Location: ./reglages.php');
    exit;
}

//variables
$title=isset($_POST['title'])?$_POST['title']:NULL;
$sub_title=isset($_POST['sub_title'])?$_POST['sub_title']:NULL;
$message=isset($_POST['message'])?$_POST['message']:NULL;
$sub_message=isset($_POST['sub_message'])?$_POST['sub_message']:NULL;
$position_img=isset($_POST['position_img'])?$_POST['position_img']:NULL;
$activer=isset($_POST['activer'])?$_POST['activer']:NULL;
$file_name = null;
$submit = isset($_POST['submit'])?$_POST['submit']:NULL;

//tableau d'erreur
$messages = array();
//debut des vérifs
if ($submit) {
    if (!empty($_FILES['image']) && !empty($_FILES['image']['name'])) {
        if(!empty($post->get_img())){
            if (unlink(ROOT.'/img/accueil/'.$slidershow->get_img())) {
                $flash->set_title('Bravo !')->set_type('green')->add_messages('Anciene images bien supprimé');
            }else{
                $flash->set_title('Erreur ! #00001')->set_type('red')->add_messages('Une erreur c\'est produite appeler un administrateur')->put();
                header('Location: /views/admin/posts_edit.php?id='.$post->get_id());
                exit;
            }
        }
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
                    $file_name = 'post_'.uniqid().'.'.strtolower(end($img['extension']));
                    if(move_uploaded_file($img['tmp_name'], ROOT.'/img/accueil/'.$file_name)) {
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
    }

    //partie qui enregistre dans la bdd
    if (empty($messages)) {
        if($activer!=null){
            $activer=1;
        }else{
            $activer=0;
        }
        $values = array(
            'id' => $id,
            'title' => $title,
            'sub_title' => $sub_title,
            'message' => $message,
            'sub_message' => $sub_message,
            'img' => $file_name,
            'position_img' => (int)$position_img,
            'active' => (int)$activer,
            'id_user' => 1
        );
        $obj_post = New Post($values);
        $dao_post = $dao_post->update($obj_post);
        if($dao_post == 1){
            $flash->set_title('Bravo !')->set_type('green')->add_messages('Post modifié !')->put();
            header('Location: reglages.php');
            exit;
        }else{
            $flash->set_title('Erreur ! #00002')->set_type('red')->add_messages('Une erreur c\'est produite appeler un administrateur')->put();
            header('Location: /views/admin/posts_edit.php?id='.$post->get_id());
            exit;
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
<!-- edit une image -->
<div class="w3-center w3-padding-64" id="contact">
  <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16"><?= $title_p ?></span>
</div>

<form class="w3-container st-margin-bottom-26" action="<?php echo $_SERVER['PHP_SELF'].'?id='.$post->get_id(); ?>" method='post' enctype="multipart/form-data">

<div class="w3-section">
  <label>Titre</label>
  <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="title" value="<?= $post->get_title() ?>">
</div>

<div class="w3-section">
  <label>Sous titre</label>
  <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="sub_title" value="<?= $post->get_sub_title() ?>">
</div>

<div class="w3-section">
  <label>Message</label>
  <textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="message"><?= $post->get_message() ?></textarea>
</div>

<div class="w3-section">
  <label>Sous message</label>
  <textarea class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="sub_message"><?= $post->get_sub_message() ?></textarea>
</div>

<div class="w3-section">
    <label>Position</label>
    <select class="w3-select w3-border w3-hover-border-black" name="position_img">
        <option value="left" <?php if($post->get_position_img()=="left")echo'selected'; ?>>Gauche</option>
        <option value="right" <?php if($post->get_position_img()=="right")echo'selected'; ?>>Droite</option>
    </select>
</div>

<div class="w3-section">
    <label>Activer ?</label>
    <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="checkbox" name="activer" <?php if($post->get_active()!=null)echo 'checked="checked"' ?>>
</div>

<div class="w3-section">
  <label>Photo (Si besoin de changer l'image)</label>
  <input type='file' class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="image">
</div>

<input type="submit" class="w3-button w3-block w3-black" name='submit' value="Modifier le post">

</form>
</div>

<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>