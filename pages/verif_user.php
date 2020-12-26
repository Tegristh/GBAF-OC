<?php 
require'autoload.php';
require'bdd_connect.php';

//variables visiteur
$userName = $_POST['userName'];

//vérificationbdd
$reponse = $bdd->prepare('SELECT COUNT(username) AS exist FROM account WHERE username = :userName');
$reponse->execute(array('userName'=>$userName));
$donnees = $reponse->fetch();
if ($donnees['exist'] != 0) {
    header('location:changepwd.php?userName='.$userName);
}
else {
    header('location:accueil.php');
};
?>