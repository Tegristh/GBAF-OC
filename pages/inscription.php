<?php 
session_start();
if (isset($_SESSION['pseudo'])){
    $usedPseudo= $_SESSION['pseudo'];
}
if (isset($_SESSION['nom'])){
    $emptyLName= $_SESSION['nom'];
}
if (isset($_SESSION['prenom'])){
    $emptyFName= $_SESSION['prenom'];
}
if (isset($_SESSION['password'])){
    $validPassword = $_SESSION['password'];
}
if (isset($_SESSION['question'])){
    $emptyQuestion = $_SESSION['question'];;
}
if (isset($_SESSION['reponse'])){
    $emptyReponse= $_SESSION['reponse'];
}
/*
$usedPseudo=True;
$emptyLName=True;
$emptyFName=true;
$validPassword=false;
$emptyQuestion=TRUE;
$emptyReponse=True;
*/
include('autoload.php');
include('bdd_connect.php');
$nom_page='inscription';
include('Head.php'); ?>
<div class="big-box">
    <div>
        <h2>Formulaire d'inscription</h2>
        <p style="text-align:center">Tous les champs sont obligatoires!</p>
    </div>
    <div>
        <form action="creationMembre.php" method="POST" >
        <div class="form-line">
            <label>
                <div>Pseudonyme: </div>
                <input type="varchar(255)" name="pseudo" />
            </label>
            <div>
                <div class="line" >
                    <label>
                        <div >Nom:</div>
                        <input type="varchar" name="nom" />
                    </label>
            
                    <label>
                        <div>Prénom:</div>
                        <input type="varchar" name="prenom" />
                    </label>
                </div> 
            </div>
<!-- alertes d'erreur -->
                <div><?php   
                        if (isset($usedPseudo) && $usedPseudo === TRUE) {
                        echo '<div class="alert">pseudonyme déjà utilisé, veuillez en choisir un autre!</div>';
                        };  
                    ?>
                
                    <?php   
                        if (isset($emptyLName) && $emptyLName === TRUE) {
                        echo '<div class="alert">Vous n\'avez pas renseigné de Nom!</div>';
                        };  
                    ?>

                <?php   
                        if (isset($emptyFName) && $emptyFName === TRUE) {
                        echo '<div class="alert">Vous n\'avez pas renseigné de Prénom!</div>';
                        };  
                    ?>
                </div>
            </div>
            <div>
                <div class="form-line">
                <div class="line">
                    <label>
                        <div>Mot de passe:</div>
                        <input type="varchar(255)" name="password" />
                    </label>
                    <label>
                        <div>Vérification:</div>
                        <input type="varchar(255)" name="verif_password" />
                    </label>
                </div>
                <div> 
                    <?php 
                        if (isset($validPassword) && $validPassword === FALSE) {
                        echo '<div class="alert">Les mots de passe ne correspondent pas!</div>';
                        }; 
                    ?>
                </div>
            </div>
        </div>
            <div class="form-line"><div class="line">
                <label>
                    <div>Question:</div>
                    <input type="text" name="question" />
                </label>
            
                <label>
                <div>Réponse :</div>
                <input type="text" name="reponse" />
                </div>
                <div><?php   
                        if (isset($emptyQuestion) && $emptyQuestion === TRUE) {
                        echo '<div class="alert">Vous n\'avez pas Choisi de question secrète!</div>';
                        };  
                    ?>
                
                    <?php   
                        if (isset($emptyReponse) && $emptyReponse === TRUE) {
                        echo '<div class="alert">Vous n\'avez pas donné la réponse à votre question secrète</div>';
                        };  
                    ?>
                </div>
            </div>
        <div class="form-line"><input type="submit"class="boutton" /></div>
        </form>
    </div>
                        </div>

<?php include('footer.php') ?>