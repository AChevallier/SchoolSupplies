
<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une fourniture
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
        <form>
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">Nom de la fourniture:</label>
                        <input type="text" id="nom_classe"></input>
                    </div>
                    <div class="input">
                        <label class="label">Nom de la fourniture:</label>
                        <select>
                          <option value="all">Commun</option>
				          <option value="maths">Mathématique</option>
				          <option value="fr">Français</option>
				          <option value="hist">Histoire/Géographie</option>
				        </select>
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
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Matière</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Crayon HB</td>
              <td>Commun</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Calculette Texas TI 83+</td>
              <td>Mathématique</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Crayon couleur</td>
              <td>Commun</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
