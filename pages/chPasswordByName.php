<?php
require'autoload.php'; 
require'bdd_connect.php';
$userName = $_POST['userName'];
$password = $_POST['password'];
$Vpassword = $_POST['Vpassword'];
//verif validité du password
if ($password == $Vpassword){
    //hash password
    $pass_hache = password_hash($password, PASSWORD_DEFAULT);
    //enregistrement en bdd
    $req = $bdd->prepare('UPDATE account SET password =  :newPassword WHERE (username = :userName )');
    $req->execute(array(
        'userName' => $userName,
        'newPassword' => $pass_hache,
    ));
    echo 'mot de passe modifié!';
    }
    else { echo'erreur, mot de passe non modifié';}
    header('Refresh:1;url=connexion.php');
    ?>