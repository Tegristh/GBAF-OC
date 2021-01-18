<?php
session_start();
require'autoload.php';
require'bdd_connect.php';
$user_id = $_SESSION['id'];
$question = $_POST['question'];
$reponse = $_POST['reponse'];
    $req = $bdd->prepare('UPDATE account SET question =  :question, reponse = :reponse WHERE (id_user = :id_user )');
    $req->execute(array(
        'id_user' => $user_id,
        'question'=> $question,
        'reponse' => htmlspecialchars($reponse),
    ));
header('location:param_compte.php');
?>