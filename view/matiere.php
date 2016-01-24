<div>
    <?php
    if ($_SESSION['isAdmin'] == 1):
    ?>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une matière
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Nom de la matière:</label>
                  <input type="text" id="nom_matiere" name="nom_matiere"></input>
                  <span id="erreur_nom_matiere" class="erreur"></span>
              </div>
          </div>
      </div>
      <div>
          <div class="input_login">
              <input class="submit" id='submit' onclick="functions.clickAdd(this.id)" type="submit" value="Ajouter"></input>
          </div>
      </div>
    </div>

    <div class="div_">
        <table id="pupils_tablet" summary="tableau des matières">
          <thead>
            <tr id="1stRow">
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
            </tr>
          </thead>
          <tbody id='body_table'>
          <?php
            $result = $bdd->query("SELECT id,nom FROM matiere;");
            foreach ($result as $row) {
              echo'<tr id="matiere_'.$row['id'].'">';
              echo'<td id="id">'.$row['id'].'</td>';
              echo'<td id="nom">'.$row['nom'].'</td>';
              echo'<td><img onclick="functions.clickModif(this.parentElement.parentElement.id)" src="../static/img/parameter.png"/> <img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
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