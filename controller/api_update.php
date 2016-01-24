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
        }