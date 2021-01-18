<?php 
session_start();
require'autoload.php';
require'bdd_connect.php';
//réinit variables de session
if (isset($_SESSION['erreur'])) {
    $_SESSION['erreur'] ='';
}
if (env('ENV')=='prod'){
    $redirect= 'http://gbaf.tegristh.fr/';
}
else {
    $redirect= 'http://localhost/GBAF-OC/';
}
//variables visiteur
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
// verification pseudo
$reponse = $bdd->prepare('SELECT COUNT(username) AS used FROM account WHERE username = :newPseudo');
$reponse->execute(array('newPseudo'=>$pseudo));
$donnees = $reponse->fetch();
if ($donnees['used'] != 0) {
    $usedPseudo = TRUE;
}
else {
    $usedPseudo= FALSE;
}
//récupération info bdd
$reponse->closeCursor();
$reponse = $bdd->prepare('SELECT id_user, nom, prenom, password  FROM account WHERE username = :pseudo');
$reponse->execute(array('pseudo' =>$pseudo));
$donnees = $reponse->fetch();
    $bddPassword =$donnees['password'];
    $userId = $donnees['id_user'];
    $userName = $donnees['nom'];
    $userFName = $donnees['prenom'];
// verification mot de passe
$correctPassword = password_verify($password,$bddPassword);
// variables de session
if (($usedPseudo == TRUE) AND ($correctPassword == TRUE)) {
    $_SESSION['id'] = $userId;
    $_SESSION['nom'] = $userName;
    $_SESSION['prenom'] = $userFName;
    $_SESSION['connecte'] = TRUE;         
}
header('location:'.$redirect.'index.php');  
?>