<?php 
session_start();
include'autoload.php'; 
include'bdd_connect.php';

if (env('ENV')=='prod'){
    $redirect= 'http://gbaf.tegristh.fr/pages/';
}
else {
    $redirect= 'http://localhost/GBAF-OC/pages/';
}


if ($_SESSION['connecte'] == TRUE){
    header('location:'.$redirect.'accueil.php');
}
else {
    header('location:'.$redirect.'connexion.php');
}

 ?>