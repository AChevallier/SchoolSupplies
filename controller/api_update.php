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
        }