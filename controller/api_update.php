<?php
session_start();
require("../controller/api_connect_db.php");
switch ($_POST['select']) {
		case 'matiere':
			$req = $bdd->prepare('UPDATE matiere SET nom = :nom WHERE id = :id;');
            $req->execute(array(
                    'nom' => $_POST["nom"],
                    'id' => $_POST["id"]
                    ));
            print 'OK';
            break;
        case 'personne':
			$req = $bdd->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, dateNaissance = :ddn, estProfesseur = :prof, login = :login WHERE id = :id;');
            $req->execute(array(
                    'nom' => $_POST["nom"],
                    'prenom' => $_POST["prenom"],
                    'ddn' => $_POST["ddn"],
                    'prof' => $_POST["prof"],
                    'login' => $_POST["login"],
                    'id' => $_POST["id"]
                    ));
            print 'OK';
            break;
        case 'classe_modif':
            $eleves = explode(",", $_POST["listEleves"]);
            $profs = explode(",", $_POST["listProfs"]);
            $req = $bdd->prepare('UPDATE classe SET nom = :nom, niveau_id = :niveau WHERE id = :id;');
            $req->execute(array(
                    'nom' => $_POST["nom_classe"],
                    'niveau' => $_POST["niveau"],
                    'id' => $_POST["id"]
                    ));
            $query = "DELETE FROM link_eleve WHERE classe_id = ".$_POST['id'].";";
            $count = $bdd->exec($query);
            $query = "DELETE FROM link_prof WHERE classe_id = ".$_POST['id'].";";
            $count = $bdd->exec($query);
            foreach ($eleves as $value) {
                $req = $bdd->prepare('INSERT INTO link_eleve VALUES(:eleve, :id)');
                $req->execute(array(
                    'eleve' => $value,
                    'id' => $_POST['id']
                    ));
            }
            foreach ($profs as $value) {
                $req = $bdd->prepare('INSERT INTO link_prof VALUES(:prof, :id)');
                $req->execute(array(
                    'prof' => $value,
                    'id' => $_POST['id']
                    ));
            }
            print 'OK';
            break;
        }