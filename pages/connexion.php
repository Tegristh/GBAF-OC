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
                <label for="pseudo">UserName:</label>
                <input type="text" id="pseudo" class="textarea" name="pseudo" />
                <label for="password">Password:</label>
                <input type="password" id="password"class="textarea" name="password" />
                </div>
                <div class="form-line">
                    <button type="submit" class="boutton" >Envoyer</button>
            </form>
    </div></div>
    <div class="form-line">
        <div class="line">
            
            <div class="grey-box"><a href="inscription.php">je n'ai pas de compte</a></div>
            <div class="grey-box"><a href="#">j'ai oublié mon mot de passe</a></div>
        </div>
    </div>

</div>

<?php require'footer.php' ?>