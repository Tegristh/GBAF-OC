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
                <input type="password" id="password" class="textarea" name="password" />
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
                <select id="question" class="textarea" name="question" >
                <!-- liste de questions https://gist.github.com/384400/46c7485afe0b9dc7d62c -->
                        <option value="">-- choisir une question --</option>
                        <option value="Comment s'appelait votre meilleur ami lorsque vous étiez adolescent ?"> Comment s'appelait votre meilleur ami lorsque vous étiez adolescent ?</option>
                        <option value="Comment s'appelait votre premier animal de compagnie ?"> Comment s'appelait votre premier animal de compagnie ?</option>
                        <option value="Quel est le premier plat que vous avez appris à cuisiner ?"> Quel est le premier plat que vous avez appris à cuisiner ?</option>
                        <option value="Quel est le premier film que vous avez vu au cinéma ?"> Quel est le premier film que vous avez vu au cinéma ?</option>
                        <option value=" Où êtes-vous allé la première fois que vous avez pris l'avion ?"> Où êtes-vous allé la première fois que vous avez pris l'avion ?</option>
                        <option value="Comment s'appelait votre instituteur préféré à l'école primaire ?"> Comment s'appelait votre instituteur préféré à l'école primaire ?</option>
                        <option value="Quel serait selon vous le métier idéal ?"> Quel serait selon vous le métier idéal ?</option>
                        <option value="Quel est le livre pour enfants que vous préférez ?"> Quel est le livre pour enfants que vous préférez ?</option>
                        <option value="Quel était le modèle de votre premier véhicule ?"> Quel était le modèle de votre premier véhicule ?</option>
                        <option value="Quel était votre surnom lorsque vous étiez enfant ?"> Quel était votre surnom lorsque vous étiez enfant ?</option>
                        <option value="Quel était votre personnage ou acteur de cinéma préféré lorsque vous étiez étudiant ?"> Quel était votre personnage ou acteur de cinéma préféré lorsque vous étiez étudiant ?</option>
                        <option value="Quel était votre chanteur ou groupe préféré lorsque vous étiez étudiant ?"> Quel était votre chanteur ou groupe préféré lorsque vous étiez étudiant ?</option>
                        <option value="Dans quelle ville vos parents se sont-ils rencontrés ?"> Dans quelle ville vos parents se sont-ils rencontrés ?</option>
                        <option value="Comment s'appelait votre premier patron ?"> Comment s'appelait votre premier patron ?</option>
                        <option value="Quel est le nom de la rue où vous avez grandi ?"> Quel est le nom de la rue où vous avez grandi ?</option>
                        <option value="Quel est le nom de la première plage où vous vous êtes baigné ?"> Quel est le nom de la première plage où vous vous êtes baigné ?</option>
                        <option value="Quel est le premier album que vous avez acheté ?"> Quel est le premier album que vous avez acheté ?</option>
                        <option value="Quel est le nom de votre équipe de sport préférée ?"> Quel est le nom de votre équipe de sport préférée ?</option>
                        <option value="Quel était le métier de votre grand-père ?"> Quel était le métier de votre grand-père ?</option>
                    </select>
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

            <div class="form-line"><button type="submit" class="boutton" >Envoyer</button></div>
        </form>
    
                        </div>

<?php require'footer.php' ?>