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
//code pour la suppression du message
if($submit){
    if ($slidershow->get_img() != null) {
        if(unlink(ROOT.'/img/accueil/'.$slidershow->get_img()) == true){
            if($dao_slidershow->delete($slidershow->get_id()) == 1){
                $flash->set_title('Suppression validé !')->set_type('green')->add_messages('L\'image c\'est supprimé avec succes !')->put();
                header('Location: ./reglages.php');
                exit;
            }
        }
    }
    $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite lors de la suppression contacter un administrateur')->put();
    header('Location: ./reglages.php');
    exit;
}
?>
<h1><?=$title?></h1>

<div class="w3-card st-margin-bottom-26">
    <header class="w3-container w3-gray">
        <h2>ID: <?= $slidershow->get_id() ?>, <?= $slidershow->get_text() ?></h2>
    </header>
    <div class="w3-container">
        <img src="/img/accueil/<?= $slidershow->get_img() ?>" alt="<?= $slidershow->get_text() ?>" style="width:100%">
        <p>Activer ? <?= $slidershow->get_active() ?></p>
        <p>Position : <?= $slidershow->get_display() ?></p>
    </div>
</div>
<form action="<?php echo $_SERVER['PHP_SELF'].'?id='. $slidershow->get_id(); ?>" method="POST">
    <input type="submit" class="w3-btn w3-block w3-red st-margin-bottom-26 w3-hover-orange" name="submit" value="Supprimer">
</form>


<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>