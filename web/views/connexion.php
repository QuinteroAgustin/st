<?php $title = 'Connexion'; ob_start(); require './../init.php';?>

<h1><?=$title?></h1>

<?php $content = ob_get_clean(); require ROOT.'/template.php'; ?>