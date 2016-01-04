
<div>
    <div id="add" onclick="core.collapsble('div_classe_col', 'icon_add')"><img src="../static/img/plus.png" id="icon_add"/>
        Ajouter une personne
    </div>

    <div id="div_classe_col" class="div_" style="display:none;">
            <div class="Row">
                <div class="Column">
                    <div class="input">
                        <label class="label">Nom:</label>
                        <input type="text" id="nom"></input>
                        <span id="erreur_nom" class="erreur"></span>
                    </div>
                    <div class="input">
                        <label class="label">Prenom:</label>
                        <input type="text" id="prenom"></input>
                        <span id="erreur_prenom" class="erreur"></span>
                    </div>
                </div>
                <div class="Column">
                    <div class="input">
                        <label class="label">Date de naissance</label>
                        <input type="date" id="ddn"></input>
                        <span id="erreur_ddn" class="erreur"></span>
                    </div>
                    <div class="input">
                        <label class="label">EstProfesseur:</label>
                        <input type="checkbox" id="isTeacher"></input>
                    </div>
                </div>
                <div class="Column">
                    <div class="input">
                        <label class="label">Login:</label>
                        <input type="text" id="login" value='.'></input>
                        <span id="erreur_login" class="erreur"></span>
                    </div>
<!--                    <div class="input">
                        <label class="label">Mot de passe:</label>
                        <input type="text" id="mdp"></input>
                        <span id="erreur_mdp" class="erreur"></span>
                    </div>-->
                </div>
            </div>
            <div>
                <div class="input_login">
                    <input class="submit" id='submit' onclick="functions.clickAdd(this.id)" type="submit" value="Ajouter"></input>
                </div>
            </div>
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
        <select id="select_filter">
          <option value="all">Tous</option>
          <option value="eleve">Élèves</option>
          <option value="prof">Professeurs</option>
        </select>
        </div>
        <table id="pupils_tablet" summary="tableau des personne">
          <thead>
            <tr>
              <td></td>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Date de Naissance</th>
              <th scope="col">EstProfesseur</th>
              <th scope="col">Login</th>
            </tr>
          </thead>
          <tbody id="body_table">
            <?php
            $result = $bdd->query("SELECT id,nom, prenom, DATE_FORMAT(dateNaissance, '%d-%m-%Y') as date, estProfesseur, login FROM personne;");
            foreach ($result as $row) {
              if($row['estProfesseur'] == 1){
                $prof = 'checked="checked"';
              }
              else{
                $prof = '';
              }
              echo'<tr id="matiere_'.$row['id'].'">';
              echo "<td style='width:10px;'><input type='checkbox'></input></td>";
              echo'<td>'.$row['id'].'</td>';
              echo'<td>'.$row['nom'].'</td>';
              echo'<td>'.$row['prenom'].'</td>';
              echo'<td>'.$row['date'].'</td>';
              echo'<td><input disabled type="checkbox" '.$prof.'></input></td>';
              echo'<td>'.$row['login'].'</td>';
              echo'<td><img onclick="" src="../static/img/parameter.png"/> <img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
              echo'</tr>';
            }
            
          ?>
          </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
  var nom = document.getElementById('nom');
  var prenom = document.getElementById('prenom');
  var login = document.getElementById('login');
  nom.onkeyup = function(){
    login.value = prenom.value.toLowerCase() + '.' + this.value.toLowerCase();
  } 
  prenom.onkeyup = function(){
    login.value = this.value.toLowerCase() + '.' + nom.value.toLowerCase();
  }  
  var selectFilter = document.getElementById('select_filter');
  selectFilter.onchange = function(){
    var tbody = document.getElementById('body_table');
    tbody.innerHTML = '';
    var callback = function(data){
      tbody.innerHTML = data;
    }
    var string;
    if(this.value == 'prof'){
      string = 'filter=prof';
    }
    else if(this.value == 'eleve'){
      string = 'filter=eleve';
    }
  else{
      string = 'filter=all';
    }
  core.ajaxRequest('../controller/api_filter_personne.php', callback, 'POST', string);
  }
</script>