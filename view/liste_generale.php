<div class="div_">
    <form method="POST" action="../controller/api_create_pdf.php" target="_blank" >
        <input style='float:right;' id="pdf" type="submit" value="PDF" name="submit"/>
    </form>
        <?php
        $result = $bdd->query("SELECT p.nom as nom, p.prenom as prenom, c.nom as classe FROM personne p, link_eleve le, classe c WHERE p.id = le.eleve_id AND le.classe_id = c.id AND p.id=".$_SESSION['id']);
        $user = $result->fetch();
        echo 'Bonjour '.$user['prenom'].' '.$user['nom'].' votre classe est '.$user['classe'].'</br></br> Voici votre liste de fourniture :</br>';
    ?>
    <table>
            <tr>
                    <th>Quantité</th>
                    <th>Fourniture</th>
                    <th>Matière</th>
            </tr>
    <?php
        $result = $bdd->query("SELECT f.nom as nom, MAX(l.quantite) as quantite, m.nom as matiere
                                                            FROM fourniture f, liste l, link_eleve le, link_prof lp, matiere m
                                                            WHERE f.id = l.fourniture_id
                                                            AND lp.classe_id = le.classe_id
                                                            AND l.prof_id = lp.prof_id
                                                            AND f.matiere_id = m.id
                                                            AND le.eleve_id = ".$_SESSION['id']."
                                                            GROUP BY m.id,f.id"
                    );
        $i = 1;
        foreach ($result as $row) {            
          echo'<tr id="liste_'.$i.'">';
          echo'<td>'.$row['quantite'].'</td>';
          echo'<td>'.$row['nom'].'</td>';
          echo'<td>'.$row['matiere'].'</td>';
          echo'</tr>';
          $i++;
        }
    ?>
    </table>

</div>