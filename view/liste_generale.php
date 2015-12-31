<div class="div_">
	<?php
	    try
	    {
	      $bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
	    }
	    catch(Exception $e)
	    {
	            die('Erreur : '.$e->getMessage());
	    }
	    $result = $bdd->query("SELECT p.nom as nom, p.prenom as prenom, c.nom as classe FROM personne p, link_eleve le, classe c WHERE p.id = le.eleve_id AND le.classe_id = c.id AND p.id=".$_SESSION['id']);
	    $user = $result->fetch();
	    echo 'Bonjour '.$user['prenom'].' '.$user['nom'].' votre classe est '.$user['classe'].'</br></br> Voici votre liste de fourniture :</br>';
	?>
	<table>
		<tr>
			<th>Quantité</th>
			<th>Fourniture</th>
		</tr>
		<?php
            try
            {
              $bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
            $result = $bdd->query("SELECT f.nom as nom, MAX(l.quantite) as quantite
								FROM fourniture f, liste l, link_eleve le, link_prof lp
								WHERE f.id = l.fourniture_id
								AND lp.classe_id = le.classe_id
								AND l.prof_id = lp.prof_id
								AND le.eleve_id = ".$_SESSION['id']."
								GROUP BY f.id"
			);
            foreach ($result as $row) {            
              echo'<tr id="liste_'.$row['id'].'">';
              echo'<td>'.$row['quantite'].'</td>';
              echo'<td>'.$row['nom'].'</td>';
              echo'</tr>';
            }
        ?>
	</table>
</div>