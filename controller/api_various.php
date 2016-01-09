<?php
require("../controller/api_connect_db.php");
switch ($_POST['select']) {
		case 'matiereToFourn':
			$result = $bdd->query("SELECT id, nom FROM fourniture where matiere_id = ".$_POST['idMatiere'].";");
			$string = '';
				foreach ($result as $row) {
					$string .= '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
				}
				print $string;
		break;
		case 'loginCheck':
			$sql = 'SELECT count(login) FROM personne where login = "'.$_POST['login'].'";';
			$result = $bdd->query($sql)->fetchColumn();
			if($result >= 1){
				print 'false';
				break;
			}
			print 'ok';
		break;
	}
