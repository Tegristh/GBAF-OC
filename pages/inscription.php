<?php 
session_start();
if (isset($_SESSION['pseudo'])){
    $usedPseudo= $_SESSION['pseudo'];
}
if (isset($_SESSION['password'])){
    $validPassword = $_SESSION['password'];
}
if (isset($_SESSION['email'])){
    $validMail = $_SESSION['email'];;
}



include('autoload.php');
include('bdd_connect.php');
$nom_page='inscription';
include('Head.php'); ?>
<div class="big-box">
    <div>
        <h2>Formulaire d'inscription</h2>
    </div>
    <div>
        <form action="creationMembre.php" method="POST" >
            <div class="form-line"><label><div>Pseudonyme: </div><input type="varchar(255)" name="pseudo" /></label>
                <div><?php   
                        if (isset($usedPseudo) && $usedPseudo === TRUE) {
                        echo '<div class="alert">pseudonyme déjà utilisé, veuillez en choisir un autre!</div>';
                        };  
                    ?>
                </div>
            </div>
            <div>
                <div class="form-line"><label><div>Mot de passe:</div><input type="varchar(255)" name="password" /></label>
                <div ><label><div>Vérification mot de passe:</div><input type="varchar(255)" name="verif_password" /></label>
                    
                    <?php 
                        if (isset($validPassword) && $validPassword === FALSE) {
                        echo '<div class="alert">Les mots de passe ne correspondent pas!</div>';
                        }; 
                    ?>
                </div>
            </div>
            <div class="form-line"><label><div>Email:</div><input type="varchar" name="email" /></label>
            <?php   
                if (isset($validMail) && $validMail === FALSE) {
                echo '<div class="alert">Format de l\'email invalide!</div>';
}; 
    ?>
        </div>
        <div class="form-line"><input type="submit"class="boutton" /></div>
        </form>
    </div>
                        </div></div>

<?php include('footer.php') ?>