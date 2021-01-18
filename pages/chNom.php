<?php
session_start();
require'autoload.php';
require'bdd_connect.php';
$user_id = $_SESSION['id'];
$newNom = $_POST['newNom'];
$nom = htmlspecialchars(strtolower($newNom));
    $req = $bdd->prepare('UPDATE account SET nom =  :newNom WHERE (id_user = :id_user )');
    $req->execute(array(
        'id_user' => $user_id,
        'newNom' =>$nom,
    ));
$_SESSION['nom'] = $nom;
header('location:param_compte.php');
?>