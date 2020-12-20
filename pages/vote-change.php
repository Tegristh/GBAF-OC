<?php
require'autoload.php';
require'bdd_connect.php';
$user_id = $_GET['user'];
$acteur_id = $_GET['acteur'];
$vote = $_GET['vote'];

$req = $bdd->prepare('UPDATE vote SET vote =  :vote WHERE (id_user = :id_user AND id_acteur = :acteur_id)');
$req->execute(array(
    'id_user' => $user_id,
    'acteur_id' => $acteur_id,
    'vote' => $vote,
   
));

header('location:acteur.php?acteur='.$acteur_id);
?>