<?php $title = 'Détails du message'; ob_start(); require './../../init.php';?>
<?php
    $dao_message = New MessageDAO();
    $flash = New Flash();
    $id=isset($_GET['id'])?$_GET['id']:NULL;
    if($id==null){
        $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite, votre message n\'existe pas ou plus')->put();
        header('Location: ./messages_list.php');
        exit;
    }
    //check si le message existe
    $message = $dao_message->find($id);
    if($message == null){
        $flash->set_title('Erreur !')->set_type('red')->add_messages('Une erreur c\'est produite, votre message n\'existe pas ou plus')->put();
        header('Location: ./messages_list.php');
        exit;
    }
    $date = new DateTime($message->get_date());
    $imgs = explode(',', $message->get_imgs());
    $dao_message->messageLu($message->get_id());
?>
<h1><?=$title?></h1>
<table class="w3-table-all w3-hoverable st-margin-top-26 st-margin-bottom-26" style="width:50px">
    <tr class="w3-light-gray">
        <td><a href="./message_nonlu.php?id=<?= $message->get_id()?>"><i class="fa fa-book-reader"></i></td>
        <td><a href="./message_remove.php?id=<?=$message->get_id()?>"><i class="fa fa-trash" style="color:red;"></i></td>
    </tr>
</table>
<div class="w3-card st-margin-bottom-26">
    <header class="w3-container w3-gray">
        <h2><?= $message->get_subject() ?></h2>
    </header>
    <div class="w3-container">
        <p class="st-retour-ligne"><?= $message->get_message() ?></p>
        <div class="w3-row-padding">
        <?php
        if($message->get_imgs() != null){
            foreach($imgs as $img){
                echo '<div class="w3-third">';
                echo '<div class="w3-card-4 st-margin-bottom-26">';
                echo '<img src="/img/message/'.$img.'" alt="'.$img.'" style="width:100%" onclick="document.getElementById(\''.$img.'\').style.display=\'block\'" class="w3-hover-opacity">';
                echo '<div class="w3-container w3-center">';
                echo '<p>Image nom: '.$img.'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div id="'.$img.'" class="w3-modal w3-animate-zoom" onclick="this.style.display=\'none\'">';
                echo '<img class="w3-modal-content" src="/img/message/'.$img.'">';
                echo '</div>';
            } 
        }
        ?>
        </div>
    </div>
    <footer class="w3-container w3-light-gray">
        <h4><?= $message->get_nom() ?> <?= $message->get_prenom() ?></h4>
        <h5><?= $message->get_email() ?> <?= $message->get_tel_format() ?></h5>
        <h6>Adrs: <?= $message->get_adresse() ?>, Ville: <?= $message->get_ville() ?>, Cp: <?= $message->get_cp() ?></h6>
        <h6>Date du message: <?= $date->format('d-m-Y H:i:s') ?></h6>
    </footer>
</div>

<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>