<?php
require'autoload.php';
require'bdd_connect.php';
$user_id = $_GET['user'];
$acteur_id = $_GET['acteur'];
$vote = $_GET['vote'];

$req = $bdd->prepare('INSERT INTO vote (id_user, id_acteur, vote) VALUES ( :id_user, :acteur_id, :user_vote)');
$req->execute(array(
    'id_user' => $user_id,
    'acteur_id' => $acteur_id,
    'user_vote' => $vote,
));

header('location:acteur.php?acteur='.$acteur_id);
?>