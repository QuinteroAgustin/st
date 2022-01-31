<?php $title = 'Menu Administrateur'; ob_start(); require './../../init.php';?>
<?php

$dao_slidershow = New SlidershowDAO();
$dao_post = New PostDAO();
$dao_card_employee = New Card_employeeDAO();

$slidershows=$dao_slidershow->findAll();
$posts=$dao_post->findAll();
$card_employees=$dao_card_employee->findAll();

?>
<h1><?=$title?></h1>

<div class="w3-row">
    <div class="w3-half w3-padding w3-container">
        <div class="w3-card">
            <header class="w3-container w3-light-grey">
                <h3>Immages <span class="w3-badge"><?= $dao_slidershow->count() ?></span> <a href="" class="w3-button w3-round-xxlarge w3-right"><i class="fas fa-plus" style="color:green;"></i></a></h3>
            </header>
            <div class="w3-container w3-padding">
                <table class="w3-table-all">
                    <tr>
                        <th>Nom</th>
                        <th>Emplacement</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                <?php
                foreach($slidershows as $slidershow){
                    echo '<tr>';
                    echo '<td>'.$slidershow->get_text().'</td>';
                    echo '<td>'.$slidershow->get_display().'</td>';
                    echo '<td>'.$slidershow->get_active().'</td>';
                    echo '<td><a href="reglages.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>&nbsp;<a class="w3-bar-item w3-button" href=""><i class="fa fa-trash" style="color:red;"></i></a></td>';
                    echo '</tr>';
                }
                ?>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-half w3-padding w3-container">
        <div class="w3-card">
            <header class="w3-container w3-light-grey">
                <h3>Postes <span class="w3-badge"><?= $dao_post->count() ?></span> <a href="" class="w3-button w3-round-xxlarge w3-right"><i class="fas fa-plus" style="color:green;"></i></a></h3>
                
            </header>
            <div class="w3-container w3-padding">
                <table class="w3-table-all">
                    <tr>
                        <th>Titre</th>
                        <th>Emplacement</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                <?php
                foreach($posts as $post){
                    echo '<tr>';
                    echo '<td>'.$post->get_title().'</td>';
                    echo '<td>'.$post->get_position_img().'</td>';
                    echo '<td>'.$post->get_active().'</td>';
                    echo '<td><a href="reglages.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>&nbsp;<a class="w3-bar-item w3-button" href=""><i class="fa fa-trash" style="color:red;"></i></a></td>';
                    echo '</tr>';
                }
                ?>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-half w3-padding w3-container">
        <div class="w3-card">
            <header class="w3-container w3-light-grey">
                <h3>Les membres <span class="w3-badge"><?= $dao_card_employee->count() ?></span> <a href="" class="w3-button w3-round-xxlarge w3-right"><i class="fas fa-plus" style="color:green;"></i></a></h3>
            </header>
            <div class="w3-container w3-padding">
                <table class="w3-table-all">
                    <tr>
                        <th>Nom prenom</th>
                        <th>Rôle</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                <?php
                foreach($card_employees as $card_employee){
                    echo '<tr>';
                    echo '<td>'.$card_employee->get_nom_prenom().'</td>';
                    echo '<td>'.$card_employee->get_role().'</td>';
                    echo '<td>'.$card_employee->get_active().'</td>';
                    echo '<td><a href="reglages.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>&nbsp;<a class="w3-bar-item w3-button" href=""><i class="fa fa-trash" style="color:red;"></i></a></td>';
                    echo '</tr>';
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>