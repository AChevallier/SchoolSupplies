
<div>
    <div id="add"  onclick="core.collapsble('div_classe_col','icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une classe
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
        <form>
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">Nom de la classe:</label>
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
        <table id="pupils_tablet" summary="tableau des classes">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Élèves</th>
              <th scope="col">Professeurs</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>2A</td>
              <td><a href="">Élèves</a></td>
              <td><a href="">Professeurs</a></td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>2</td>
              <td>1B</td>
              <td><a href="">Élèves</a></td>
              <td><a href="">Professeurs</a></td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>3</td>
              <td>TA</td>
              <td><a href="">Élèves</a></td>
              <td><a href="">Professeurs</a></td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
