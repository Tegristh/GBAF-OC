<?php 
session_start();
include'autoload.php';
include'bdd_connect.php';

$user_id = $_SESSION['id'];
$acteur_id = $_POST['id_acteur'];


if (isset($_POST['message'])){
    $message = htmlspecialchars($_POST['message']);

    $req = $bdd->prepare('INSERT INTO post (id_user, id_acteur, date_add, post) VALUES(:userID, :acteurID, CURDATE(), :post)');
    $req->execute(array(
        'userID' => $user_id,
        'acteurID' => $acteur_id,
        'post' => $message,
        
    ));
}

//Puis rediriger vers acteur.php
header('location:acteur.php?acteur='.$acteur_id);
?>