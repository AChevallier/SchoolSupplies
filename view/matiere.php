
<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une matière
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
        <form id='matiere_insert' method="POST" action="../controller/api_matiere.php">
            <input type="hidden" value="insert" name="method" id="method"></input>
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">Nom de la matière:</label>
                        <input type="text" id="nom_matiere" name="nom_matiere"></input>
                    </div>
                </div>
            </div>
            <div>
                <div class="input_login">
                    <input class="submit" type="submit" value="Ajouter"></input>
                </div>
            </div>
        </form>
    </div>

    <div class="div_">
        <table id="pupils_tablet" summary="tableau des matières">
          <thead>
            <tr>
              <td></td>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
            </tr>
          </thead>
          <tbody>
          <?php
          try
            {
              $bdd = new PDO('mysql:host=localhost;dbname=schoolsu;charset=utf8', 'root', 'root');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
            $result = $bdd->query("SELECT id,nom FROM matiere;");
            foreach ($result as $row) {
              echo'<tr>';
              echo "<td style='width:10px;'><input type='checkbox'></input></td>";
              echo'<td>'.$row['id'].'</td>';
              echo'<td>'.$row['nom'].'</td>';
              echo'<td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>';
              echo'</tr>';
            }
            
          ?>
          </tbody>
        </table>
    </div>
</div>
