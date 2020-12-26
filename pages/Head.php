<!DOCTYPE html>
<html lang="fr">
<head>
<title><?php echo $nom_page.' '; ?> - Groupement Banque Assurance Français</title>
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="shortcut icon" type="image/png" href="http://gbaf.tegristh.fr/img/bq/LOGOGBAF.png"/>
<link href="../styles/default.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/eb85e4a2ad.js" crossorigin="anonymous"></script>
<meta charset="utf-8" >
</head>
<body>
    <div class="main-content">
        <header>
        <div class="logo">
            <?php 
                if (env('ENV')=='prod'){
                $redirect= 'http://gbaf.tegristh.fr/';
                }
                else {
                $redirect= 'http://localhost/GBAF-OC/';
                }
            ?>
 

            <a class="navbar" href="<?php echo $redirect.'index.php'; ?>">
                <img src="http://gbaf.tegristh.fr/img/bq/LOGOGBAF.png" width="80" height="102" alt="site logo">
            </a>
        </div>
       
                <?php
                    if (isset($_SESSION['nom']) AND isset($_SESSION['prenom'])) {
                        echo ' <div class="user">';
                        echo '<div ><a href="param_compte.php" title="profil"><i class="fas fa-user"></i></a></div><div >';
                        echo ucfirst($_SESSION['prenom']).' '.strtoupper($_SESSION['nom']) ;
                        echo '</div><div class="deconnecter"><a href="deconnect.php" title="Se déconnecter!"><i class="far fa-times-circle"></i></a></div>';
                        echo ' </div>';
                    }
                     ?>
            

       
        </header>