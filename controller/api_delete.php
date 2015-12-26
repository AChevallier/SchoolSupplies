<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
	$query = "DELETE FROM ".$_POST['select']." WHERE id = ".$_POST['id'].";";
	echo $query;
	$count = $bdd->exec($query);
	print 'ok ='.$count;
	$bdd = null;
?>