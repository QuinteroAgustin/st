<?php $title = 'Détails des messages'; ob_start(); require './../../init.php';?>
<?php
//liste des objet
$dao_message = New MessageDAO();
$id=isset($_GET['id'])?$_GET['id']:NULL;
if($id && !empty($id)){
    $dao_message->messageNonLu($id);
    header('Location: messages_list.php');
}
?>
<h1><?=$title?></h1>

<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>