<?php 
require_once("../controller/api_connect_db.php");
if(is_uploaded_file($_FILES['file']['tmp_name'])){
	
	//Process the CSV file
	$handle = fopen($_FILES['file']['tmp_name'], "r");
	$data = fgetcsv($handle, 1000, ","); //Remove if CSV file does not have column headings
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$nom = $data[0];
		$prenom = $data[1];
		$ddn = $data[2];
		
		$req = $bdd->prepare("INSERT INTO personne VALUES ('',:nom,:prenom, :ddn, 0, :login, :password, 0)");
	    $req->execute(array(
	                    'nom' => $nom,
	                    'prenom' => $prenom,
	                    'ddn' => $ddn,
	                    'login' => strtolower($prenom).'.'.strtolower($nom),
	                    'password' => $nom
	                    ));
	}
	header('Location: ../view/index.php?tab=personne');
}
else{
	die("Vous ne devriez pas être là");
}

mysql_close();
?>