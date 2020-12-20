<?php 
session_start();
if ($_SESSION['connecte'] != TRUE){
    header('location:'.$redirect.'connexion.php');
}
require'autoload.php'; 
require'bdd_connect.php';
$user_id= $_SESSION['id'];
$nom_page='paramètres du compte';
require'Head.php'; ?>
<div class="big-box">
    <h2>Paramètres du compte</h2>
<!-- formulaire username-->
<!-- formulaire password-->
<!-- formulaire nom-->
<!-- formulaire prenom-->
<!-- formulaire question/réponse secrete-->
</div>
<?php require'footer.php' ?>