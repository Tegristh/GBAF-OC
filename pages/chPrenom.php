<?php
session_start();
require'autoload.php';
require'bdd_connect.php';
$user_id = $_SESSION['id'];
$newPrenom = $_POST['newPrenom'];
$prenom = htmlspecialchars(strtolower($newPrenom));
    $req = $bdd->prepare('UPDATE account SET prenom =  :newPrenom WHERE (id_user = :id_user )');
    $req->execute(array(
        'id_user' => $user_id,
        'newPrenom' =>$prenom,
    ));
$_SESSION['prenom'] = $prenom;
header('location:param_compte.php');
?>