<?php 
session_start();
include('autoload.php');
include('bdd_connect.php');
$nom_page='connexion';
include('Head.php'); ?>
<div class="big-box">
    <div>
        <h2>Connexion</h2>
    </div>

    <div>
    <form action="connect_membre.php" method="POST" class="container text-left">
                <div class="form-line"><label><div>Pseudo: </div><input type="varchar(255)" name="pseudo" /></label></div>
                <!-- <p><?php ?></p> -->
                <div class="form-line"><label><div>Mot de passe:</div><input type="varchar(255)" name="password" /></label></div>
                <!-- <p><?php ?></p> -->
                <div class="form-line"><input type="submit" class="boutton" /></div>
            </form>
    </div>
    <div class="form-line"><a href="inscription.php">Je n'ai pas de compte!</a></div>
</div>

<?php include('footer.php') ?>