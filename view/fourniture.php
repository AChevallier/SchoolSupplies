
<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une fourniture
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Nom de la fourniture:</label>
                  <input type="text" id="nom_fourniture"></input>
                  <span id="erreur_nom_fourniture" class="erreur"></span>
              </div>
              <div class="input">
                  <label class="label">Groupe de la fourniture:</label>
                  <select id='select_matiere'>
                  <?php
                      $result = $bdd->query("SELECT id, nom FROM matiere;");
                      foreach ($result as $row) {
                        echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
                      }
                  ?>
                  </select>
              </div>
          </div>
      </div>
      <div>
          <div class="input_login">
              <input class="submit" onclick="functions.clickAdd(this.id)" type="submit" id='submit' value="Ajouter"></input>
          </div>
      </div>
    </div>

    <div class="div_">
        <table id="pupils_tablet" summary="tableau des matières">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Matière</th>
            </tr>
          </thead>
          <tbody id='body_table'>
          <?php
            $result = $bdd->query("SELECT f.id as id,f.nom,m.nom as mnom FROM fourniture f, matiere m WHERE f.matiere_id = m.id;");
            foreach ($result as $row) {
              echo'<tr id="matiere_'.$row['id'].'">';
              echo'<td>'.$row['id'].'</td>';
              echo'<td>'.$row['nom'].'</td>';
              echo'<td>'.$row['mnom'].'</td>';
              echo'<td><img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
              echo'</tr>';
            }
            
          ?>
          </tbody>
        </table>
    </div>
</div>
