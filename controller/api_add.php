<?php
session_start();
require("../controller/api_connect_db.php");
$erreurs = [];
switch ($_POST['select']) {
		case 'matiere':
                        $erreurs['nom_matiere'] = check_string($_POST["nom_matiere"]);
                        if (count(array_filter($erreurs)) == 0){
                            $req = $bdd->prepare('INSERT INTO matiere VALUES(\'\',:nom)');
                            $req->execute(array(
                                    'nom' => $_POST["nom_matiere"]
                                    ));
                            print json_encode('');
                            break;
                        }
                        print json_encode($erreurs);
                        break;

		case 'fourniture':
                        $erreurs['nom_fourniture'] = check_string($_POST["nom_fourniture"]);
                        if(count(array_filter($erreurs)) == 0){
                            $req = $bdd->prepare('INSERT INTO fourniture VALUES(\'\',:nom, :matiere, NULL)');
                            $req->execute(array(
                                    'nom' => $_POST["nom_fourniture"],
                                    'matiere' => $_POST['select_matiere']
                                    ));

                            print json_encode('');
                            break;
                        }
			print json_encode($erreurs);
                        break;
		case 'personne':
            foreach ($_POST as $key => $value) {
                if(in_array($key, ['nom', 'prenom', 'login'])){
                    $erreurs[$key] = check_string($value);
                }
                else if( $key == 'ddn'){
                    $erreurs[$key] = check_date($value);
                }
            }
            if(count(array_filter($erreurs)) == 0){
                $req = $bdd->prepare('INSERT INTO personne VALUES(\'\',:nom, :prenom, :ddn, :estP, :login, :mdp, NULL)');
                $req->execute(array(
				'nom' => $_POST["nom"],
				'prenom' => $_POST['prenom'],
				'ddn' => $_POST['ddn'],
				'estP' => $_POST['isTeacher'],
				'login' => $_POST['login'],
				'mdp' => $_POST['nom'],
				)); 

                print json_encode('');
                break;
            }
			print json_encode($erreurs);
			break;
		case 'classe':
			$eleves = explode(",", $_POST["listEleves"]);
			$profs = explode(",", $_POST["listProfs"]);
            $erreurs['nom_classe'] = check_string($_POST["nom_classe"]);
            if(count(array_filter($erreurs)) == 0){
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
                print json_encode('');
            }
            print json_encode($erreurs);
			break;
		case 'liste':
            $erreurs['quantite'] = check_quantite($_POST["quantite"]);
            if (count(array_filter($erreurs)) == 0){
    			$req = $bdd->prepare('INSERT INTO liste VALUES(\'\',:prof, :fourniture,:matiere, :quantite)');
    			$req->execute(array(
    				'prof' => $_SESSION["id"],
    				'fourniture' => $_POST['fourn'],
    				'matiere' => $_POST['matiere'],
    				'quantite' => $_POST['quantite']
    				));
                print json_encode('');
                break;
            }
            print json_encode($erreurs);
			break;
		case 'affectation_classe':
			$req = $bdd->prepare('INSERT INTO affectation_classe VALUES (:prof, :matiere)');
			$req->execute(array(
				'prof' => $_POST['prof'],
				'matiere' => $_POST['matiere']
				));
            print json_encode('');
			break;
		default:
		print 'default';
			break;
	}
$bdd = null;
function check_string($input = '')
{   
    if( $input == ''){
        return 'ne peut pas être nulle';
    }
    else if(is_string($input) && !is_numeric($input) && !is_null($input))
        return;
    return 'ce n\'est pas une string';
}
function check_quantite($input = ''){
    if( $input == ''){
        return 'ne peut pas être nulle';
    }
    else if($input == 0)
        return 'ne peut pas être égale à 0';
    else if(is_numeric($input))
        return;
    return 'ce n\'est pas un numérique';
}

function check_date($input = ''){
    if($input == ''){
        return 'la date ne peut pas être nulle';
    }
    try {
        $pieces = explode("-", $input);
        $annee = $pieces[0];
        $mois = $pieces[1];
        $jour = $pieces[2];
        if(checkdate($mois, $jour, $annee)){
            return;
        }
        else{
            return 'date non reconnu';
        }
    } catch (Exception $ex) {
        return 'date non reconnu';
    }
    return 'date non reconnu';
}
?>