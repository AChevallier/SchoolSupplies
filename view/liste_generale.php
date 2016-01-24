<div class="div_">
    <form method="POST" action="../controller/api_create_pdf.php" target="_blank" >
        <input style='float:right;' id="pdf" type="submit" value="PDF" name="submit"/>
    </form>
        <?php
        $result = $bdd->query("SELECT p.nom as nom, p.prenom as prenom, c.nom as classe FROM personne p, link_eleve le, classe c WHERE p.id = le.eleve_id AND le.classe_id = c.id AND p.id=".$_SESSION['id']);
        $user = $result->fetch();
        echo 'Bonjour '.$user['prenom'].' '.$user['nom'].' votre classe est '.$user['classe'].'</br></br> Voici votre liste de fourniture :</br>';
    ?>
    <div class="drag">
        <ul>
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
                  echo '<li draggable="true"  ondragstart="drag(event)" data-value="'.$i.'" id="'.$i.'">'.$row['quantite'].' - '.$row['nom'].' - '.$row['matiere'].'</li>';
                  $i++;
                }
            ?>
        </ul>
    </div>
    <br/>
    <br/>
    <div id="div_classe_col" class="div_">
        <div class="Row">
            <div class="Column">
            Je n'ai pas
                <div class="drag">
                    <ul ondrop="drop(event)" ondragover="allowDrop(event)">
                    </ul>
                </div>
            </div>
            <div class="Column">
            J'ai
                <div class="drag">
                    <ul ondrop="drop(event)" ondragover="allowDrop(event)">
                    </ul>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
document.allowDrop = function(ev) {
    ev.preventDefault();
}

document.drag = function(ev) {
    ev.dataTransfer.setData("Text", ev.target.id);
}

document.drop = function(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("Text");
    ev.target.appendChild(document.getElementById(data));
}
</script>