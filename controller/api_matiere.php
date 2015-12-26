<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if($_POST['method'] == 'insert'){

	$req = $bdd->prepare('INSERT INTO matiere VALUES(\'\',:nom)');
	$req->execute(array(
		'nom' => $_POST["nom_matiere"]
		));
}
$bdd = null;
?>