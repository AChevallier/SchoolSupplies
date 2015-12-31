<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une fourniture à la liste
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Quantité</label>
                  <input type="text" id="quantite"></input>
              </div>
              <div class="input">
                  <label class="label">Fournitures:</label>
                  <select id="famille_four">
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
                  <select id="fourn">
                    <option value="-1">---</option>

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
              <th scope="col">ID</th>
              <th scope="col">Quantité</th>
              <th scope="col">Fournitures</th>
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
            $result = $bdd->query("SELECT l.id as id, l.quantite as quantite, f.nom as fnom FROM liste l, personne p, fourniture f WHERE l.prof_id = p.id AND l.fourniture_id = f.id AND p.id = ".$_SESSION['id']);
            foreach ($result as $row) {            
              echo'<tr id="liste_'.$row['id'].'">';
              echo "<td style='width:10px;'><input type='checkbox'></input></td>";
              echo'<td>'.$row['id'].'</td>';
              echo'<td>'.$row['quantite'].'</td>';
              echo'<td>'.$row['fnom'].'</td>';
              echo'<td><img onclick="" src="../static/img/parameter.png"/> <img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
              echo'</tr>';
            }
          ?>
          </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
var famille_four = document.getElementById('famille_four');
var fourn = document.getElementById('fourn');

famille_four.onchange = function() {
 console.log(this.selectedOptions[0]);
 var callback = function(data){    
  fourn.innerHTML = data;
 }
 string = 'select=matiereToFourn&idMatiere='+this.selectedOptions[0].value;
 core.ajaxRequest('../controller/api_various.php',callback, 'POST', string);
 fourn.innerHTML = '<option value="-1">---</option>';
}
</script>