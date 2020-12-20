<?php 
session_start();
require'autoload.php';
require'bdd_connect.php';
//réinit variables de session
if (isset($_SESSION['erreur'])) {
    $_SESSION['erreur'] ='';
}
//variables connexion bdd
$user = env('DB_USER');
$host = env('DB_HOST');
$passWord = env('DB_PASSWORD');
//variables visiteur
$pseudo = $_POST['pseudo'];
$nom = strtolower($_POST['nom']);
$prenom = strtolower($_POST['prenom']);
$password = $_POST['password'];
$verifPassword = $_POST['verif_password'];
$question = strtolower($_POST['question']);
$reponseQuestion = $_POST['reponse'];

// verification champ non vides
if (!isset($nom)){
    $emptyFName = TRUE;
}
else {$emptyFName = FALSE;}

if (!isset($prenom)){
    $emptyLName = TRUE;
}
else {$emptyLName = FALSE;}

if (!isset($question)){
    $emptyQuestion = TRUE;
}
else {$emptyQuestion = FALSE;}

if (!isset($reponseQuestion)){
    $emptyReponse = TRUE;
}
else {$emptyReponse = FALSE;}

//verification disponibilité pseudo
$reponse = $bdd->prepare('SELECT COUNT(username) AS used FROM account WHERE username = :newPseudo');
$reponse->execute(array('newPseudo'=>$pseudo));
$donnees = $reponse->fetch();
if ($donnees['used'] != 0) {
    $usedPseudo = TRUE;
}
else {
    $usedPseudo= FALSE;
}
$reponse->closeCursor();
//verification mot de passe et copie de mot de passe identiques
if ($password == $verifPassword){
    $validPassword = TRUE;
}
else {
    $validPassword = FALSE;
}

/*//verification format email
if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $email)){
    $validMail = TRUE;
}
else {
    $validMail = FALSE;
}
*/



// Vérification de la validité des informations
if (    ($usedPseudo == TRUE)
     OR ($emptyLName == TRUE)
     OR ($emptyFName == TRUE)
     OR ($validPassword == FALSE) 
     OR ($emptyReponse == TRUE)
     OR ($emptyQuestion == TRUE) 
     ){
    $_SESSION = array(        
             "pseudo" => $usedPseudo,
             "nom" => $emptyLName,
             "prenom" =>$emptyFName,
             "password" => $validPassword,
             "question" => $emptyQuestion,
             "reponse" => $emptyReponse,
             );
        header('location:inscription.php');
}
else {

//hash mot de passe
$pass_hache = password_hash($password, PASSWORD_DEFAULT);

//entrée user en bdd
$req = $bdd->prepare('INSERT INTO account(nom, prenom, username, password , question, reponse) VALUES(:nom, :prenom, :username, :pass, :question, :reponse)');
$req->execute(array(
    'nom' => htmlspecialchars($nom),
    'prenom' =>htmlspecialchars($prenom),
    'username' => htmlspecialchars($pseudo),
    'pass' => $pass_hache,
    'question' => htmlspecialchars($question),
    'reponse' => htmlspecialchars($reponseQuestion) ));


//redirection
header('location:connexion.php');
};
?>


