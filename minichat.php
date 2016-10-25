<!DOCTYPE html>
<html>
<head>
	<title>TP : MINI-CHAT</title>
</head>
<style>
</style>
<body>

	<h2>MINI CHAT</h2>

	<form action="minichat_post.php" method="POST">
		<p>
			<label>Pseudo :</label> <input type="text" name="pseudo"> <br>
			<label>Message :</label> <input type="text" name="message"> <br>
			<input type="submit" value="Envoyer">
		</p>
	</form>

	<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	$chat = $bdd->query('SELECT UPPER(pseudo) AS pseudo_majuscule, id, message, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_fr FROM minichat ORDER BY ID DESC LIMIT 0, 10');

	while ($message = $chat->fetch())
	{
		echo '<p>ID '. $message[id] . ' - Le ' . $message[date_fr] . ' <strong>' . htmlspecialchars($message['pseudo_majuscule']) . '</strong>' .' : ' . htmlspecialchars($message['message']) . '</p>';
	}
	
	$compteur = $bdd->query('SELECT COUNT(id) AS nb_message FROM minichat');

	$donnees = $compteur->fetch();

	echo '<p>' . 'Il y a eu ' . '<strong>' . $donnees['nb_message'] . '</strong>' . ' messages depuis la creation du chat.' . '</p>' . '<a href="delete.php">Vider le MINI-CHAT</a>';

	?>

	<h2>UPDATE CHAT</h2>

	<form action="update_post.php" method="POST">
		<p>
			<label>ID :</label> <input type="text" name="id"> <br>
			<label>Message :</label> <input type="text" name="update_message"> <br>
			<input type="submit" value="Envoyer">
		</p>
	</form>

	<h2>Delete CHAT</h2>

	<form action="delete_post.php" method="POST">
		<p>
			<label>Pseudo :</label> <input type="text" name="del_pseudo"> <br>
			<label>ID :</label> <input type="text" name="del_id"> <br>
			<input type="submit" value="Envoyer">
		</p>
	</form>
</body>
</html>