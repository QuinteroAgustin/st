<?php $title = 'Menu Administrateur'; ob_start(); require './../../init.php';?>
<?php

$dao_user = New UserDAO();
$dao_message = New MessageDAO();
$dao_entretien = New UserDAO();
$dao_post = New PostDAO();


?>
<h1><?=$title?></h1>

<div class="w3-row">
    <div class="w3-half w3-padding w3-container">
        <div class="w3-card">
            <header class="w3-container w3-light-grey">
                <h3>Réglage de l'accueil <span class="w3-badge w3-right"><?= $dao_post->count() ?></span></h3>
            </header>
            <div class="w3-container w3-padding">
                <p>1 new friend request</p>
                <hr>
                <a href="reglages.php" class="w3-button w3-blue">Réglages</a>
            </div>
        </div>
    </div>
    <div class="w3-half w3-padding w3-container">
        <div class="w3-card">
            <header class="w3-container w3-light-grey">
                <h3>Nombre d'entretiens <span class="w3-badge w3-green w3-right">0</span></h3>
            </header>
            <div class="w3-container w3-padding">
                <p>1 new friend request</p>
                <hr>
                <a href="" class="w3-button w3-blue">Liste des entretiens</a>
            </div>
        </div>
    </div>
    <div class="w3-half w3-padding w3-container">
        <div class="w3-card">
            <header class="w3-container w3-light-grey">
                <h3>Messages non Lu <span class="w3-badge w3-red w3-right"><?= $dao_message->count() ?></span></h3>
            </header>
            <div class="w3-container w3-padding">
                <p>1 new friend request</p>
                <hr>
                <a href="./messages_list.php" class="w3-button w3-blue">Liste des messages</a>
            </div>
        </div>
    </div>
    <div class="w3-half w3-padding w3-container">
        <div class="w3-card">
            <header class="w3-container w3-light-grey">
                <h3>Nombre d'utilisateur <span class="w3-badge w3-right"><?= $dao_user->count() ?></span></h3>
            </header>
            <div class="w3-container w3-padding">
                <p>1 new friend request</p>
                <hr>
                <a href="" class="w3-button w3-blue">Liste des utilisateurs</a>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>