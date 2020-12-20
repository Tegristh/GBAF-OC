<?php 
session_start();
require'autoload.php';
require'bdd_connect.php';

$user_id = $_SESSION['id'];
$acteur_id = $_POST['id_acteur'];


$nb_commentaires_user = $bdd->prepare('SELECT COUNT(*) AS nb_commentaires_user FROM post WHERE id_acteur = :acteur_id AND id_user = :userID');
$nb_commentaires_user->execute(array(
    'acteur_id'=>$acteur_id,
    'userID' => $user_id,
    ));
$user_comment_count = $nb_commentaires_user->fetch();
echo $user_comment_count['nb_commentaires_user'];

// poster un message
if ( (isset($_POST['message']))  AND ($user_comment_count['nb_commentaires_user'] == 0))   

{
    $message = htmlspecialchars($_POST['message']);

    $req = $bdd->prepare('INSERT INTO post (id_user, id_acteur, date_add, post) VALUES(:userID, :acteurID, CURDATE(), :post)');
    $req->execute(array(
        'userID' => $user_id,
        'acteurID' => $acteur_id,
        'post' => $message,
        
    ));
}
echo $user_comment_count['nb_commentaires_user'];
/* prévoir de remplacer un message pour un user qui voudrais re-poster ou modifier son avis.
elseif ( (isset($_POST['message']))  AND ($user_comment_count['nb_commentaires_user'] != 0)){
    
}   
*/
//Puis rediriger vers acteur.php
header('location:acteur.php?acteur='.$acteur_id);
?>