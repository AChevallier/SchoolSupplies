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
		case 'matiereToFourn':
			$result = $bdd->query("SELECT id, nom FROM fourniture where matiere_id = ".$_POST['idMatiere'].";");
		break;
	}
$string = '';
foreach ($result as $row) {
	$string .= '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
}
print $string;