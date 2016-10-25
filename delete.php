<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$delete = $bdd->query("DELETE FROM `minichat`");

header('Location: minichat.php');

?>