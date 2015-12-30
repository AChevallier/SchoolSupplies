
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
              </div>
              <div class="input">
                  <label class="label">Groupe de la fourniture:</label>
                  <select id='select_matiere'>
                  <?php
                    try
                      {
                        $bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
                      }
                      catch(Exception $e)
                      {
                              die('Erreur : '.$e->getMessage());
                      }
                      $result = $bdd->query("SELECT id, nom FROM matiere;");
                      foreach ($result as $row) {
                        echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
                      }
                  ?>
                  </select>
              </div>
              <!--   <div class="input">
                  <label class="label">Niveau de la fourniture:</label>
                  <select>
                    <option value="all">2nd</option>
                    <option value="maths">1ère</option>
                    <option value="fr">Terminal</option>
                    <option value="hist">Tous</option>
                  </select>
              </div> -->
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
              <td></td>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
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
            $result = $bdd->query("SELECT f.id as id,f.nom,m.nom as mnom FROM fourniture f, matiere m WHERE f.matiere_id = m.id;");
            foreach ($result as $row) {
              echo'<tr id="matiere_'.$row['id'].'">';
              echo "<td style='width:10px;'><input type='checkbox'></input></td>";
              echo'<td>'.$row['id'].'</td>';
              echo'<td>'.$row['nom'].'</td>';
              echo'<td>'.$row['mnom'].'</td>';
              echo'<td><img onclick="" src="../static/img/parameter.png"/> <img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
              echo'</tr>';
            }
            
          ?>
          </tbody>
        </table>
    </div>
</div>
