<?php 
$user = env('DB_USER');
$host = env('DB_HOST');
$bdd_name = env('DB_NAME');
$passWord = env('DB_PASSWORD');
try
{
    $bdd = new PDO('mysql:host='.$host.';dbname='.$bdd_name.';charset=utf8', $user, $passWord, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //$bdd = new mysqli($host, $user, $passWord, $bdd_name);
}
catch(Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
