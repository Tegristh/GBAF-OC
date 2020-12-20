<?php 
session_start();
if (isset($_SESSION['erreur'])){
    $erreur= $_SESSION['erreur'];
}
require'autoload.php';
require'bdd_connect.php';
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
    <form action="connexionMembre.php" method="POST" >
                <div class="form-line">

                    <label>
                       
                        <div>Pseudo: </div>
                        <input type="text" style="width:90%" class="textarea" name="pseudo" />
                    
                    </label>
                    <label>
                        <div>Mot de passe:</div>
                        <input type="text" style="width:90%" class="textarea" name="password" />
                    </label>
                    <!-- Se souvenir de moi
                        <label>
                       
                        <div>Se souvenir de moi
                        <input type="checkbox" name="souvenir" /></div>
                    </label> -->
                
                
                <div class="form-line"><input type="submit" class="boutton" /></div>
            </form>
    </div></div>
    <div class="form-line">
        <div class="line">
            
<!-- Prévu mais pas dans le cahier des charges 
    <div class="grey-box"><a href="#">j'ai oublié mon pseudo</a></div> 
-->
            <div class="grey-box"><a href="inscription.php">je n'ai pas de compte</a></div>
            <div class="grey-box"><a href="#">j'ai oublié mon mot de passe</a></div>
        </div>
    </div>

</div>

<?php require'footer.php' ?>