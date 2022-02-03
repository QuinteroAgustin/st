<?php
/**
 * template.php
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST- <?= $title ?></title>
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="w3-display-container w3-blue w3-top" style="height:26px;">
        <div class="w3-display-topleft st-padding-left-16"><a href="tel:+33609303178">+33 6 09 30 31 78</a></div>
        <div class="w3-display-topmiddle"><a href="mailto:quintero.entreprise@gmail.com">quintero.entreprise@gmail.com</a></div>
        <div class="w3-display-topright st-padding-right-16">385 chem. de la petite graverie 31250 Revel</div>
    </div>
    <?php include ROOT.'/views/menu.php'?>
    <!-- Content -->
    <div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
        <?= $content ?>
    </div>
    
    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-light-grey w3-center">
        <h4>Footer</h4>
        <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>Haut de page</a>
        <div class="w3-xlarge w3-section">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
        </div>
        <p>Réalisé par <a href="/index.php" title="st-servicetechnique" target="_blank" class="w3-hover-text-green">ST</a>, <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
    </footer>
</body>
</html>