<?php 
session_start();
include'autoload.php'; 
include'bdd_connect.php';

if (env('ENV')=='prod'){
    $redirect= 'http://gbaf.tegristh.fr/';
}
else {
    $redirect= 'http://localhost/GBAF-OC/';
}
session_unset();
 
header('location:'.$redirect.'index.php');


?>