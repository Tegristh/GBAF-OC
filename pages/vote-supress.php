<?php
require'autoload.php';
require'bdd_connect.php';
$user_id = $_GET['user'];
$acteur_id = $_GET['acteur'];

$req = $bdd->prepare('DELETE FROM vote WHERE (id_user = :id_user AND id_acteur = :acteur_id)');
$req->execute(array(
    'id_user' => $user_id,
    'acteur_id' => $acteur_id,
   
));

header('location:acteur.php?acteur='.$acteur_id);
?>