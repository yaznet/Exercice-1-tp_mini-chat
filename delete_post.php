<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$del = $bdd->prepare('DELETE FROM minichat WHERE pseudo = :pseudo');
$del->bindValue(':pseudo', $_POST['del_pseudo']);
$del->execute();

$del = $bdd->prepare('DELETE FROM minichat WHERE id = :id');
$del->bindValue(':id', $_POST['del_id']);
$del->execute();

header('Location: minichat.php');

?>