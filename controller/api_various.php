<?php
require("../controller/api_connect_db.php");
switch ($_POST['select']) {
		case 'matiereToFourn':
			$result = $bdd->query("SELECT id, nom FROM fourniture where matiere_id = ".$_POST['idMatiere'].";");
		break;
	}
$string = '';
foreach ($result as $row) {
	$string .= '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
}
print $string;