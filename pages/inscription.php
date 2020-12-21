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
require'autoload.php';
require'bdd_connect.php';
$nom_page='inscription';
require'Head.php'; ?>
<div class="big-box">
    <div>
        <h2>Formulaire d'inscription</h2>
        <p style="text-align:center">Tous les champs sont obligatoires!</p>
    </div>
    <div>
        <form action="creationMembre.php"  method="POST" >
        
            <div class="form-line">
            <label for="pseudo">UserName:</label>
                <input type="text" id="pseudo" class="textarea" name="pseudo" />
            <label for="nom">Nom:</label>
                <input type="text" id="nom" class="textarea" name="nom" />
            <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" class="textarea" name="prenom" />
<!-- alertes d'erreur -->
                <div>
                    <?php   
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
           
            <div class="form-line">    
            <label for="password">Password:</label>
                <input type="password" id="password"class="textarea" name="password" />
            <label for="verif_password">Vérification:</label>
                <input type="password" id="verif_password"  class="textarea" name="verif_password" />
                   
                <div> 
                    <?php 
                        if (isset($validPassword) && $validPassword === FALSE) {
                        echo '<div class="alert">Les mots de passe ne correspondent pas!</div>';
                        }; 
                    ?>
                </div>
            </div>
            
            <div class="form-line">
            <label for="question">Question secrète:</label>
                <input type="text" id="question" class="textarea" name="question" />
            <label for="reponse">Réponse à la question secrète :</label>
                <input type="text" id="reponse" class="textarea" name="reponse" />
              
                <div>
                    <?php   
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

            <div class="form-line"><button type="submit"class="boutton" >Envoyer</button>
        </form>
    </div>
                        </div>

<?php require'footer.php' ?>