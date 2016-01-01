<link rel="stylesheet" href="../static/css/graphique.css">
<div>
<div id='max'>11</div>
	<table>
	</table>
	<div id="horizontal_bar"></div>
<div id='min'>0</div>
	<table>
	<tr id="libel"></tr>
	</table>
</div>
<script type="text/javascript">
var style  = document.getElementById('tablecss');
style.remove();
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
	$result = $bdd->query("SELECT MAX(l.quantite) as quantite, m.nom as nom
						FROM fourniture f, liste l, link_eleve le, link_prof lp, matiere m
						WHERE f.id = l.fourniture_id
						AND lp.classe_id = le.classe_id
						AND l.prof_id = lp.prof_id
						AND f.matiere_id = m.id
						AND le.eleve_id = ".$_SESSION['id']."
						GROUP BY m.id,f.id"
	);
	$req = $result->fetchAll();
	echo 'var data = '.json_encode($req).';';
	// foreach ($result as $row) { 
	// 	echo 'data.push({"nom": 1, "number":2})';
	// }
?>

</script>
<script src="../static/js/graphique.js"></script>