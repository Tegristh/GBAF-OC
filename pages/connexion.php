<?php 
session_start();
if (isset($_SESSION['erreur'])){
    $erreur= $_SESSION['erreur'];
}
include('autoload.php');
include('bdd_connect.php');
$nom_page='connexion';
include('Head.php'); ?>
<div class="big-box">
    <div>
        <h2>Connexion</h2>
        <div style="text-align:center;">
            <?php
                if (isset($erreur)){
                echo '<p>'.$erreur.'</p>';
                }?>
        </div>
    </div>

    <div>
    <form action="connexionMembre.php" method="POST" class="container text-left">
                <div class="form-line">

                    <label>
                       
                        <div>Pseudo: </div>
                        <input type="varchar(255)" name="pseudo" />
                    
                    </label>
                    <label>
                        <div>Mot de passe:</div>
                        <input type="varchar(255)" name="password" />
                    </label>
                    <!-- Se souvenir de moi
                        <label>
                       
                        <div>Se souvenir de moi
                        <input type="checkbox" name="souvenir" /></div>
                    </label> -->
                </div>
                
                <div class="form-line"><input type="submit" class="boutton" /></div>
            </form>
    </div>
    <div class="form-line"><a href="inscription.php">Je n'ai pas de compte!</a></div>
</div>

<?php include('footer.php') ?>