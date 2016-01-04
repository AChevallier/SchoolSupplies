<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['submit']) && $_POST['submit'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password']))) {

	require("../controller/api_connect_db.php");

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = $bdd ->prepare('SELECT id, login, isAdmin, estProfesseur FROM personne WHERE login=:login AND password=:password');
	$sql->execute(array(
				'login' => $_POST["login"],
				'password' => $_POST['password']
				));
	$user = $sql->fetch();
	// si on obtient une réponse, alors l'utilisateur est un membre
		if ($user['login'] == $_POST['login']) {
			session_start();
			$_SESSION['id'] = $user['id'];
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['isAdmin'] = $user['isAdmin'];
			$_SESSION['estProfesseur'] = $user['estProfesseur'];
			header('Location: index.php');
			exit();
		}
		// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
		elseif ($user['login'] != $_POST['login']) {
			$erreur = 'Compte non reconnu.';
		}
		// sinon, alors la, il y a un gros problème :)
		else {
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
		}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>School Supplies</title>
		<link rel="stylesheet" href="../static/css/style.css">
		<link rel="stylesheet" href="../static/css/login.css">
	</head>
	<body>
		<div>
			<img src="../static/img/logo_moche.png" class="logo"/>
		</div>
		<div>
			<div id="div_connection">
				<form method='POST' action='login.php'>
					<div class="input_login">
						<label class="label_login">Login:</label>
						<input type="text" name="login" id="login"></input>
					</div>
					<div class="input_login">
						<label class="label_login">Mot de passe:</label>
						<input type="password" name="password" id="password"></input>
					</div>
					<div class="input_login">
						<input class="submit" name="submit" type="submit" value="Connexion"></input>
					</div>
				</form>
				<?php
				if (isset($erreur)) echo '<br /><br />',$erreur;
			?>
			</div>
		</div>
	</body>
</html>