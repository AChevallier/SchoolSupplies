
<div>
    <?php
    if ($_SESSION['isAdmin'] == 1):
    ?>
    <div id="add"  onclick="core.collapsble('div_classe_col','icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une classe
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Nom de la classe:</label>
                  <input type="text" id="nom_classe"></input>
              </div>
          </div>
         <div class="Column">
            <div class="input">
                <label class="label">Niveau:</label>
                <select id='niveau'>
                  <?php
                        $result = $bdd->query("SELECT id, nom FROM niveau");
                        foreach ($result as $row) {
                          echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
                        }
                    ?>
                </select>
            </div>
          </div>
      </div>
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Élèves:</label>
                  <select id='select_eleve'>
                    <option id="-1">----</option>
                    <?php
                        $result = $bdd->query("SELECT id, nom, prenom FROM personne p WHERE estProfesseur = 0 AND p.id NOT IN (SELECT eleve_id FROM link_eleve)");
                        foreach ($result as $row) {
                          echo '<option value="'.$row['id'].'">'.$row['prenom'].'-'.$row['nom'].'</option>';
                        }
                    ?>
                  </select>
              </div>
              <table id='table_eleve'>
              
              </table>
          </div>
          <div class="Column">
              <div class="input">
                  <label class="label">Professeurs:</label>
                  <select id='select_prof'>
                   <option id='-2'>----</option>
                    <?php
                        $result = $bdd->query("SELECT id, nom, prenom FROM personne p WHERE estProfesseur = 1;");
                        foreach ($result as $row) {
                          echo '<option value="'.$row['id'].'">'.$row['prenom'].'-'.$row['nom'].'</option>';
                        }
                    ?>
                  </select>
                  <table id='table_prof'>
              
                   </table>
              </div>
          </div>
      </div>
      <div>
          <div class="input_login">
              <input class="submit" onclick="functions.clickAddClasses(this.id, listEleves, listProfs)" id="submit" type="submit" value="Ajouter"></input>
          </div>
      </div>
    </div>

    <div class="div_">
        <table id="pupils_tablet" summary="tableau des classes">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Niveau</th>
              <th scope="col">Élèves</th>
              <th scope="col">Professeurs</th>
            </tr>
          </thead>
          <tbody id='body_table'>
            <?php
            $result = $bdd->query("SELECT c.id as id, c.nom as nom, n.nom as niveau  FROM classe c, niveau n WHERE c.niveau_id = n.id;");
            foreach ($result as $row) {
              $title_eleve = $bdd->query("SELECT p.nom as nom, p.prenom as prenom FROM classe c, link_eleve le, personne p WHERE c.id = le.classe_id AND le.eleve_id = p.id AND c.id = ".$row['id'].";");
              $eleves = '<ul>';
              foreach ($title_eleve as $eleve) {
                $eleves .= '<li>'.$eleve['nom'].' '.$eleve['prenom'].'</li>';
              }
              $eleves .= '</ul>';
              $title_prof = $bdd->query("SELECT p.nom as nom, p.prenom as prenom FROM classe c, link_prof le, personne p WHERE c.id = le.classe_id AND le.prof_id = p.id AND c.id = ".$row['id'].";");
              $profs = '<ul>';
              foreach ($title_prof as $prof) {
                $profs .= '<li>'.$prof['nom'].' '.$prof['prenom'].'</li>';
              }
              $profs .= '</ul>';
              echo'<tr id="matiere_'.$row['id'].'">';
              echo'<td>'.$row['id'].'</td>';
              echo'<td>'.$row['nom'].'</td>';
              echo'<td>'.$row['niveau'].'</td>';
              echo'<td class="ht">Élèves<span class="tooltip">'.$eleves.'</span></td>';
              echo'<td class="ht">Professeurs<span class="tooltip">'.$profs.'</span></td>';
              echo'<td><img onclick="changeLocation('.$row['id'].')" src="../static/img/parameter.png"/> <img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
              echo'</tr>';
            }
            
          ?>
          </tbody>
        </table>
    </div>
    <?php
        else:
    ?>
    Il ne faut pas être ici
    <?php endif ?>
</div>
<script type="text/javascript">
 var selectEleve = document.getElementById('select_eleve');
 var tableEleve = document.getElementById('table_eleve');
 var selectProf = document.getElementById('select_prof');
 var tableProf = document.getElementById('table_prof');
 var listEleves = [];
 var listProfs = [];
 selectEleve.onchange = function(value){
  if(this.selectedOptions[0].innerHTM != '---'){
    tableEleve.innerHTML += '<tr><td>'+this.selectedOptions[0].innerHTML+'</td></tr>';
    listEleves.push(this.selectedOptions[0].value);
    this.remove(this.selectedIndex);
  }
  
 }
  selectProf.onchange = function(value){
  if(this.selectedOptions[0].innerHTM != '---'){
    tableProf.innerHTML += '<tr><td>'+this.selectedOptions[0].innerHTML+'</td></tr>';
    listProfs.push(this.selectedOptions[0].value);
    //this.remove(this.selectedIndex)
  }
  
 }
 function changeLocation(id){
  window.location.href = 'index.php?tab=classe_modif&id='+id;
 }
</script>
