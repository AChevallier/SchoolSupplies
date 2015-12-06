
<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une matière
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
        <form>
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">Nom de la matière:</label>
                        <input type="text" id="nom_classe"></input>
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
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Français</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Mathématiques</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Histoire-Géographie</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
