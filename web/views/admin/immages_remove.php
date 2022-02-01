<?php $title = 'Supprimer une image'; ob_start(); require './../../init.php';?>
<?php

?>
<h1><?=$title?></h1>


<?php $content = ob_get_clean(); require ROOT.'/views/admin/templateadmin.php'; ?>