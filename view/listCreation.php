
<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une fourniture à la liste
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
        <form>
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">Quantité</label>
                        <input type="text" id="quantite"></input>
                    </div>
                    <div class="input">
                        <label class="label">Fournitures:</label>
                        <select id="famille_four">
                          <option value="all">Tous</option>
                          <option value="commun">Commun</option>
                          <option value="maths">Mathématique</option>
                          <option value="fr">Français</option>
                          <option value="hist">Histoire/Géographie</option>
                        </select>
                        <select id="fourn">
                          <option value="crayonHB">Crayon HB</option>
                          <option value="ti83">Calculette Texas TI 83+</option>
                          <option value="couleur">Crayon couleur</option>
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
              <th scope="col">Quantité</th>
              <th scope="col">Fournitures</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>1</td>
              <td>Crayon HB</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>2</td>
              <td>1</td>
              <td>Calculette Texas TI 83+</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>3</td>
              <td>2</td>
              <td>Crayon couleur</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
