<?php 
$user = env('DB_USER');
$host = env('DB_HOST');
$passWord = env('DB_PASSWORD');
try
{
    $bdd = new PDO('mysql:host='.$host.';dbname=gbaf;charset=utf8', $user, $passWord, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
