<?php
session_start();
require'autoload.php';
require'bdd_connect.php';
$user_id = $_SESSION['id'];
$password = $_POST['password'];
$verifPassword = $_POST['Vpassword'];

//verif validité du password
if ($password == $verifPassword){
//hash password
$pass_hache = password_hash($password, PASSWORD_DEFAULT);
//enregistrement en bdd
$req = $bdd->prepare('UPDATE account SET password =  :newPassword WHERE (id_user = :id_user )');
$req->execute(array(
    'id_user' => $user_id,
    'newPassword' => $pass_hache,
));
echo 'mot de passe modifié!';
}
else { echo'erreur, mot de passe non modifié';}
header('Refresh:1;url=param_compte.php');
?>