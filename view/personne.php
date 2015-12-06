
<div>
    <div id="add" onclick="core.collapsble('add_pupils_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une personne
    </div>

    <div id="add_pupils_col" class="div_" style="display:none;">
        <form>
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">Nom:</label>
                        <input type="text" id="nom"></input>
                    </div>
                    <div class="input">
                        <label class="label">Prenom:</label>
                        <input type="text" id="prenom"></input>
                    </div>
                </div>
                <div class="Column">
                    <div class="input">
                        <label class="label">Date de naissance</label>
                        <input type="date" id="ddn"></input>
                    </div>
                    <div class="input">
                        <label class="label">EstProfesseur:</label>
                        <input type="checkbox" id="isTeacher"></input>
                    </div>
                </div>
                <div class="Column">
                    <div class="input">
                        <label class="label">Login:</label>
                        <input type="text" id="login" disabled="disabled"></input>
                    </div>
                    <div class="input">
                        <label class="label">Mot de passe:</label>
                        <input type="text" id="mdp"></input>
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
        
    <div id="csv" onclick="core.collapsble('add_csv', 'icon_add_csv')"><img src="../static/img/plus.png" id="icon_add_csv"/>
        Ajouter un csv d'élèves
    </div>

    <div id="add_csv" class="div_" style="display:none;">
        <form>
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">CSV:</label>
                        <input type="file" id="csv"></input>
                    </div>
                </div>
            </div>
            <div class="input_login">
              <input class="submit" type="submit" value="Ajouter"></input>
            </div>
        </form>
    </div>


    <div class="div_">
        <div id="filter" onclick="core.collapsble('filter_div','icon_add_filter')" ><img src="../static/img/plus.png" id="icon_add_filter"/>
          Filter
        </div>
        <div id="filter_div" style="display:none;">
        <select>
          <option value="all">Tous</option>
          <option value="eleve">Élèves</option>
          <option value="prof">Professeurs</option>
        </select>
        </div>
        <table id="pupils_tablet" summary="tableau des personne">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Date de Naissance</th>
              <th scope="col">EstProfesseur</th>
              <th scope="col">Login</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Chevallier</td>
              <td>Alexandre</td>
              <td>28/12/1993</td>
              <td>Non</td>
              <td>alexandre.chevallier</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Borrédon</td>
              <td>Hervé</td>
              <td>25/09/1984</td>
              <td>Oui</td>
              <td>herve.borredon</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Chopin</td>
              <td>Frédéric</td>
              <td>1/03/1810</td>
              <td>Oui</td>
              <td>chopin.frederic</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
            <tr>
              <td>4</td>
              <td>Beck</td>
              <td>Jason Charles</td>
              <td>20/03/1972</td>
              <td>Non</td>
              <td>beck.jasonch</td>
              <td><img onclick="" src="../static/img/parameter.png"/> <img onclick="" src="../static/img/remove.png"/></td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
