<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$update = $bdd->prepare('UPDATE minichat SET message = :message WHERE id = id');
$del->bindValue(':pseudo', $_POST['update_message']);
$del->execute();

header('Location: minichat.php');

?>