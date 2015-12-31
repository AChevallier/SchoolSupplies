<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une fourniture à la liste
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Professeurs:</label>
                  <select id="prof">
                    <option value="-1">---</option>
                    <?php
                      try
                      {
                        $bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
                      }
                      catch(Exception $e)
                      {
                              die('Erreur : '.$e->getMessage());
                      }
                      $result = $bdd->query("SELECT id, nom, prenom FROM personne WHERE estProfesseur = 1");
                      foreach ($result as $row) {            
                        echo'<option value='.$row['id'].'>'.$row['prenom'].' '.$row['nom'].'</option>';
                      }
                    ?>
                  </select>
              </div>
          </div>
      </div>
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Matières:</label>
                  <select id="matiere">
                    <option value="-1">---</option>
                    <?php
                      try
                      {
                        $bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
                      }
                      catch(Exception $e)
                      {
                              die('Erreur : '.$e->getMessage());
                      }
                      $result = $bdd->query("SELECT id, nom FROM matiere");
                      foreach ($result as $row) {            
                        echo'<option value='.$row['id'].'>'.$row['nom'].'</option>';
                      }
                    ?>
                  </select>
              </div>
          </div>
      </div>
      <div>
          <div class="input_login">
              <input class="submit" type="submit" onclick="functions.clickAdd(this.id)" id="submit" value="Ajouter"></input>
          </div>
      </div>
    </div>

    <div class="div_">
        <table id="pupils_tablet" summary="tableau des matières">
          <thead>
            <tr>
              <td></td>
              <th scope="col">Prénom professeur</th>
              <th scope="col">Nom professeur</th>
              <th scope="col">Matière</th>
            </tr>
          </thead>
          <tbody id='body_table'>
          <?php
            try
            {
              $bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
            $result = $bdd->query("SELECT p.nom as nom, p.prenom prenom, m.nom as matiere FROM personne p, affectation_classe ac, matiere m WHERE ac.prof_id = p.id AND ac.matiere_id = m.id");
            foreach ($result as $row) {            
              echo'<tr id="liste_'.$row['id'].'">';
              echo "<td style='width:10px;'><input type='checkbox'></input></td>";
              echo'<td>'.$row['nom'].'</td>';
              echo'<td>'.$row['prenom'].'</td>';
              echo'<td>'.$row['matiere'].'</td>';
              echo'<td><img onclick="" src="../static/img/parameter.png"/> <img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
              echo'</tr>';
            }
          ?>
          </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">

</script>