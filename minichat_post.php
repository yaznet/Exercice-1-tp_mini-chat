<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$message = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_creation) VALUES(?, ?, NOW())');
$message->execute(array($_POST['pseudo'], $_POST['message']));

header('Location: minichat.php');
?>