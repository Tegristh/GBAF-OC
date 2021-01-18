<?php
session_start();
require'autoload.php';
require'bdd_connect.php';
$user_id = $_SESSION['id'];
$newUserName = $_POST['newUserName'];
    $req = $bdd->prepare('UPDATE account SET username =  :newUserName WHERE (id_user = :id_user )');
    $req->execute(array(
        'id_user' => $user_id,
        'newUserName' => htmlspecialchars($newUserName),
    ));
header('location:param_compte.php');
?>