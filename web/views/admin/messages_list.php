<?php $title = 'Liste des messages'; ob_start(); require './../../init.php';?>
<?php
//liste des objet
    $dao_message = New MessageDAO();
    

    //variables
    $recherche = isset($_POST['recherche'])?$_POST['recherche']:NULL;
    $submit = isset($_POST['submit'])?$_POST['submit']:NULL;
    if($submit && $recherche != null){
        $messages = $dao_message->rechercher($recherche);
    }else{
        $messages = $dao_message->findAll();
    }
?>
<h1><?=$title?></h1>

<form class="w3-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' enctype="multipart/form-data">
    <div class="w3-section">
      <label>Recherche</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="recherche" value="<?= $recherche ?>">
    </div>
    <input type="submit" class="w3-button w3-block w3-black" name='submit' value="Rechercher"><br>
    <input type="reset" class="w3-button w3-block w3-black" name='reset' value="Rénitialiser">
</form>

<table class="w3-table-all w3-hoverable w3-margin">
    <tr class="w3-light-blue">
        <th class="w3-hide-small w3-hide-medium">ID</th>
        <th>Nom</th>
        <th class="w3-hide-small w3-hide-medium">Prenom</th>
        <th class="w3-hide-small">Email</th>
        <th>Sujet</th>
        <th class="w3-right-align">Actions</th>
    </tr>
    <?php
    foreach($messages as $message){
        if($message->get_active()==1){
            $c = 'w3-khaki w3-hover-orange';
        }else{
            $c = 'w3-hover-grey';
        }
        echo '<tr class="'.$c.'">';
        echo '<td class="w3-hide-small w3-hide-medium">'.$message->get_id().'</td>';
        echo '<td>'.$message->get_nom().'</td>';
        echo '<td class="w3-hide-small w3-hide-medium">'.$message->get_prenom().'</td>';
        echo '<td class="w3-hide-small">'.$message->get_email().'</td>';
        echo '<td>'.$message->get_subject().'</td>';
        echo '<td class="w3-right-align"><a href="./message_detail.php?id='.$message->get_id().'"><i class="fas fa-plus"></i></a>&nbsp;<a href="./message_archive.php?id='.$message->get_id().'"><i class="fas fa-archive"></i></a>&nbsp;<a href="./message_remove.php?id='.$message->get_id().'"><i class="fa fa-trash"></i></a></td>';
        echo '</tr>';
    }
    ?>
</table>

<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>