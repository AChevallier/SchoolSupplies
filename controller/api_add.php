<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
switch ($_POST['select']) {
		case 'matiere':
			$req = $bdd->prepare('INSERT INTO matiere VALUES(\'\',:nom)');
			$req->execute(array(
				'nom' => $_POST["nom_matiere"]
				));
			break;

		case 'fourniture':
			$req = $bdd->prepare('INSERT INTO fourniture VALUES(\'\',:nom, :matiere, NULL)');
			$req->execute(array(
				'nom' => $_POST["nom_classe"],
				'matiere' => $_POST['select_matiere']
				));
			break;
		case 'personne':
			$req = $bdd->prepare('INSERT INTO personne VALUES(\'\',:nom, :prenom, :ddn, :estP, :login, :mdp, NULL)');
			$req->execute(array(
				'nom' => $_POST["nom"],
				'prenom' => $_POST['prenom'],
				'ddn' => $_POST['ddn'],
				'estP' => $_POST['isTeacher'],
				'login' => $_POST['login'],
				'mdp' => $_POST['mdp'],
				));
			break;
		default:
		print 'default';
			break;
	}
$bdd = null;
?>