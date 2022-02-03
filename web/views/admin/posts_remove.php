<?php $title_p = 'Supprimer un post'; ob_start(); require './../../init.php';?>
<?php
//On appele les objs qu'on utilise
$flash = New Flash();
$dao_post = New PostDAO();
$id=isset($_GET['id'])?$_GET['id']:NULL;
$submit=isset($_POST['submit'])?$_POST['submit']:NULL;
    
//check si le post a un id
if($id==null){
    $flash->set_title('Erreur ! 00004')->set_type('red')->add_messages('Une erreur c\'est produite, votre post n\'existe pas ou plus')->put();
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
//code pour la suppression du message
if($submit){
    if ($post->get_img() != null) {
        if(unlink(ROOT.'/img/accueil/'.$post->get_img()) == true){
            $flash->set_title('Bravo !')->set_type('green')->add_messages('Image supprimé')->put();
        }else{
            $flash->set_title('Erreur ! #00001')->set_type('red')->add_messages('Erreur lors de la suppression de l\'image')->put();
            header('Location: ./posts_remove.php?id='.$post->get_id());
            exit();
        }
    }
    if($dao_post->delete($post->get_id()) == 1){
        $flash->set_title('Suppression validé !')->set_type('green')->add_messages('Le post c\'est supprimé avec succes !')->put();
        header('Location: ./reglages.php');
        exit;
    }
    $flash->set_title('Erreur ! #00006')->set_type('red')->add_messages('Une erreur c\'est produite lors de la suppression contacter un administrateur')->put();
    header('Location: ./reglages.php');
    exit;
}
?>
<h1><?=$title_p?></h1>

<div class="w3-card st-margin-bottom-26">
    <header class="w3-container w3-gray">
        <h2>ID: <?= $post->get_id() ?>, <?= $post->get_title() ?></h2>
    </header>
    <div class="w3-container">
        <p>Image :</p>
        <img src="/img/accueil/<?= $post->get_img() ?>" alt="<?= $post->get_img() ?>" style="width:100%">
        <p>Titre: <?= $post->get_title() ?></p>
        <p>Sous titre: <?= $post->get_sub_title() ?></p>
        <p>Message: <?= $post->get_message() ?></p>
        <p>Sous message: <?= $post->get_sub_message() ?></p>
        <p>Position image: <?= $post->get_position_img() ?></p>
        <p>Activer ? <?= $post->get_active() ?></p>
    </div>
</div>
<form action="<?php echo $_SERVER['PHP_SELF'].'?id='. $post->get_id(); ?>" method="POST">
    <input type="submit" class="w3-btn w3-block w3-red st-margin-bottom-26 w3-hover-orange" name="submit" value="Supprimer">
</form>


<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>