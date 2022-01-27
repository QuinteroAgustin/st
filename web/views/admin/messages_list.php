<?php $title = 'Liste des messages'; ob_start(); require './../../init.php';?>
<?php
    //liste des objet
    $dao_message = New MessageDAO();
    
    //variables
    $recherche = isset($_POST['recherche'])?$_POST['recherche']:NULL;
    $submit = isset($_POST['submit'])?$_POST['submit']:NULL;
    $page=isset($_GET['page'])?$_GET['page']:NULL;
    $id=isset($_GET['id'])?$_GET['id']:NULL;

    //pagination
    if($page && !empty($page)){
        $currentPage = (int)strip_tags($page);
    }else{
        $currentPage = 1;
    }
    $nbMessages = (int)$dao_message->countTotal();
    $nbMessagesPage= 10;
    $pages=ceil($nbMessages/$nbMessagesPage);
    $premier = ($currentPage * $nbMessagesPage)-$nbMessagesPage;

    //va chercher les messages dans la bdd
    if($submit && $recherche != null){
        $messages = $dao_message->recherche($recherche);
    }else{
        $messages = $dao_message->findAllPage($premier, $nbMessagesPage);
    }

    if($id && !empty($id)){
        $dao_message->messageLu($id);
        header('Location: messages_list.php?page='.$currentPage);
    }

?>
<h1><?=$title?></h1>

<form class="w3-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
    <div class="w3-section">
      <label>Recherche</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="recherche" value="<?= $recherche ?>">
    </div>
    <input type="submit" class="w3-button w3-block w3-black" name='submit' value="Rechercher"><br>
    <input type="reset" class="w3-button w3-block w3-black" name='reset' value="Rénitialiser">
</form>

<table class="w3-table-all w3-hoverable st-margin-top-26 st-margin-bottom-26">
    <tr class="w3-light-blue">
        <th class="w3-hide-small w3-hide-medium">ID</th>
        <th>Nom</th>
        <th class="w3-hide-small w3-hide-medium">Prenom</th>
        <th class="w3-hide-small">Email</th>
        <th>Sujet</th>
        <th>Date</th>
        <th class="w3-right-align">Actions</th>
    </tr>
    <?php
    foreach($messages as $message){
        if($message->get_active()==1){
            $c = 'w3-khaki w3-hover-orange';
        }else{
            $c = 'w3-hover-grey';
        }
        $date = new DateTime($message->get_date());
        echo '<tr class="'.$c.'">';
        echo '<td class="w3-hide-small w3-hide-medium">'.$message->get_id().'</td>';
        echo '<td>'.$message->get_nom().'</td>';
        echo '<td class="w3-hide-small w3-hide-medium">'.$message->get_prenom().'</td>';
        echo '<td class="w3-hide-small">'.$message->get_email().'</td>';
        echo '<td>'.substr($message->get_subject(),0,30).'..</td>';
        echo '<td>'.$date->format('d-m H:i').'</td>';
        echo '<td class="w3-right-align"><a href="./message_detail.php?id='.$message->get_id().'"><i class="fas fa-plus" style="color:green;"></i></a>&nbsp;&nbsp;<a href="?page='.$currentPage.'&id='.$message->get_id().'"><i class="fas fa-book"></i></a>&nbsp;&nbsp;<a href="./message_remove.php?id='.$message->get_id().'"><i class="fa fa-trash" style="color:red;"></i></a></td>';
        echo '</tr>';
    }
    ?>
</table>

<div class="w3-bar w3-center st-margin-bottom-26">
    <a href="?page=<?=$currentPage-1?>" class="w3-button <?= ($currentPage ==1) ? "w3-disabled" : "" ?>">&laquo;</a>
    <?php for($i=1;$i<=$pages;$i++): ?>
        <a href="?page=<?= $i ?>" class="w3-button <?= ($currentPage == $i)?'w3-green':'' ?>"><?= $i ?></a>
    <?php endfor ?>
  <a href="?page=<?=$currentPage+1?>" class="w3-button <?= ($currentPage == $pages) ? "w3-disabled" : "" ?>">&raquo;</a>
</div>

<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>