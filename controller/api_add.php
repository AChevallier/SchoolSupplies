<?php
session_start();
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
				'nom' => $_POST["nom_fourniture"],
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
		case 'classe':
			$eleves = explode(",", $_POST["listEleves"]);
			$profs = explode(",", $_POST["listProfs"]);
			$req = $bdd->prepare('INSERT INTO classe VALUES(\'\',:nom, (SELECT id FROM niveau WHERE id = :niveau))');
			$req->execute(array(
				'nom' => $_POST["nom_classe"],
				'niveau' => $_POST['niveau']
				));
			foreach ($eleves as $value) {
				$req = $bdd->prepare('INSERT INTO link_eleve VALUES(:eleve, (SELECT max(id) FROM classe))');
				$req->execute(array(
					'eleve' => $value
					));
			}
			foreach ($profs as $value) {
				$req = $bdd->prepare('INSERT INTO link_prof VALUES(:prof, (SELECT max(id) FROM classe))');
				$req->execute(array(
					'prof' => $value
					));
			}
			break;
		case 'liste':
			$req = $bdd->prepare('INSERT INTO liste VALUES(\'\',:prof, :fourniture, :quantite)');
			$req->execute(array(
				'prof' => $_SESSION["id"],
				'fourniture' => $_POST['fourn'],
				'quantite' => $_POST['quantite']
				));
			break;
		default:
		print 'default';
			break;
	}
$bdd = null;
?>