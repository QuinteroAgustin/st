<?php $title = 'Supprimer une image'; ob_start(); require './../../init.php';?>
<?php

$dao_slidershow = New SlidershowDAO();
$flash = New Flash();
$id=isset($_GET['id'])?$_GET['id']:NULL;
$submit=isset($_POST['submit'])?$_POST['submit']:NULL;
    
//check si le message a un id
if($id==null){
    $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite, votre image n\'existe pas ou plus')->put();
    header('Location: ./reglages.php');
    exit;
}
//check si le message existe
$slidershow = $dao_slidershow->find($id);
if($slidershow == null){
    $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite, votre image n\'existe pas ou plus')->put();
    header('Location: ./reglages.php');
    exit;
}
$date = new DateTime($message->get_date());

    //code pour la suppression du message
    if($submit){
        if ($message->get_imgs() != null) {
            $imgs = explode(',', $message->get_imgs());
            foreach ($imgs as $img) {
                unlink(ROOT.'/img/message/'.$img);
            }
        }
        if($dao_message->delete($message->get_id()) == 1){
            $flash->set_title('Suppression validé !')->set_type('green')->add_messages('Le message c\'est supprimé avec succes !')->put();
            header('Location: ./messages_list.php');
        }else{
            $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite lors de la suppression contacter un administrateur')->put();
            header('Location: ./messages_list.php');
        }
    }
?>
<h1><?=$title?></h1>

<div class="w3-card st-margin-bottom-26">
    <header class="w3-container w3-gray">
        <h2><?= $message->get_subject() ?></h2>
    </header>
    <div class="w3-container">
        <p class="st-retour-ligne"><?= substr($message->get_message(), 0, 200) ?>...</p>
    </div>
    <footer class="w3-container w3-gray">
        <h4><?= $message->get_nom() ?> <?= $message->get_prenom() ?></h4>
        <h5><?= $message->get_email() ?> <?= $message->get_tel_format() ?></h5>
        <h6>Adrs: <?= $message->get_adresse() ?>, Ville: <?= $message->get_ville() ?>, Cp: <?= $message->get_cp() ?></h6>
        <h6>Date du message: <?= $date->format('d-m-Y H:i:s') ?></h6>
    </footer>
</div>
<form action="<?php echo $_SERVER['PHP_SELF'].'?id='. $message->get_id(); ?>" method="POST">
    <input type="submit" class="w3-btn w3-block w3-red st-margin-bottom-26 w3-hover-orange" name="submit" value="Supprimer">
</form>


<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>