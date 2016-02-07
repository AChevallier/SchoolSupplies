<?php
	$classeSQL = $bdd->query("SELECT id , nom  FROM classe c WHERE c.id = ".$_GET['id']);
    $classe = $classeSQL->fetch();
    $niveauSQL = $bdd->query("SELECT n.id as id, n.nom  FROM niveau n, classe c WHERE c.niveau_id = n.id AND c.id = ".$_GET['id']);
    $niveau = $niveauSQL->fetch();
    $eleveSQL = $bdd->query("SELECT le.eleve_id, le.classe_id, p.nom as nom, p.prenom as prenom  FROM link_eleve le, personne p WHERE le.eleve_id = p.id AND classe_id = ".$_GET['id']);
    $eleveList = [];
    $eleveListNom = [];
    foreach ($eleveSQL as $eleve) {
    	$eleveList[] = $eleve['eleve_id'];
    	$eleveListNom[$eleve['eleve_id']] = $eleve['nom'].' '.$eleve['prenom'];
    }
    $profSQL = $bdd->query("SELECT prof_id, classe_id, p.nom as nom, p.prenom as prenom  FROM link_prof lp, personne p WHERE lp.prof_id = p.id AND classe_id = ".$_GET['id']);
    $profList = [];
    $profListNom = [];
    foreach ($profSQL as $prof) {
    	$profList[] = $prof['prof_id'];
    	$profListNom[$prof['prof_id']]  = $prof['nom'].' '.$prof['prenom'];
    }
?>
<div>
	<div id="div_classe_col" class="div_">
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Nom de la classe:</label>
                  <input type="text" value="<?php print $classe['nom']?>" id="nom_classe"></input>
              </div>
          </div>
         <div class="Column">
            <div class="input">
                <label class="label">Niveau:</label>
                <select id='niveau'>
                  <?php
                        $result = $bdd->query("SELECT id, nom FROM niveau");
                        foreach ($result as $row) {
                          echo '<option id="niveau_'.$row['id'].'" '.($row['id'] === $niveau['id'] ? "selected=selected" : "").' value="'.$row['id'].'">'.$row['nom'].'</option>';
                        }
                    ?>
                </select>
            </div>
          </div>
      </div>

      <span id="erreur_classe" class="erreur"></span>
      <div class="Row">
          <div class="Column">
              <div class="input">
                  <label class="label">Élèves:</label>
                  <select multiple id='select_eleve'>
                    <option id="-1">----</option>
                    <?php
                        $result = $bdd->query("SELECT id, nom, prenom FROM personne p WHERE estProfesseur = 0 AND isAdmin = 0 OR isAdmin is null AND p.id NOT  IN (SELECT eleve_id FROM link_eleve)");
                        foreach ($result as $row) {
                          echo '<option class="select_eleve" id="select_eleve_'.$row['id'].'" value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
                        }
                    ?>
                  </select>
                  <button id="button_eleve">Ajouter</button>
              </div>
              <br/>
              <table id='table_eleve'>
              
              </table>
          </div>
          <div class="Column">
              <div class="input">
                  <label class="label">Professeurs:</label>
                  <select multiple id='select_prof'>
                   <option id='-1'>----</option>
                    <?php
                        $result = $bdd->query("SELECT id, nom, prenom FROM personne p WHERE estProfesseur = 1 AND isAdmin = 0 OR isAdmin is null;");
                        foreach ($result as $row) {
                          echo '<option class="select_prof" id="select_prof_'.$row['id'].'" value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
                        }
                    ?>
                  </select>
                  <button id="button_prof">Ajouter</button>
              </div>              <br>
              <table id='table_prof'>
          
               </table>
          </div>
      </div>
       <div>
          <div class="input_login">
              <input class="submit" onclick="functions.clickModifClasses(<?php echo $_GET['id'] ?>, listEleves, listProfs)" id="submit" type="submit" value="Ajouter"></input>
          </div>
      </div>
</div>
<div id="success">Modification effectué</div>
<script type="text/javascript">
	var selectEleve = document.getElementById('select_eleve');
	var tableEleve = document.getElementById('table_eleve');
	var selectProf = document.getElementById('select_prof');
	var tableProf = document.getElementById('table_prof');
	var listEleves = <?php echo json_encode($eleveList) ?>;
	var listProfs = <?php echo json_encode($profList) ?>;
	var listNomE = <?php echo json_encode($eleveListNom) ?>;
	var listNomP = <?php echo json_encode($profListNom) ?>;
	for( var key in listNomE) {
		tableEleve.innerHTML += '<tr id="eleve_'+key+'"><td>'+listNomE[key]+'<img onclick="removeList(this.parentElement.parentElement)" src="../static/img/remove.png"/></td></tr>';
	};
	for( var key in listNomP) {
		tableProf.innerHTML += '<tr id="prof_'+key+'"><td>'+listNomP[key]+'<img onclick="removeList(this.parentElement.parentElement)" src="../static/img/remove.png"/></td></tr>';
	};
  for (var i = selectEleve.length - 1; i >= 0; i--) {
    if(selectEleve[i].id == -1)
      continue;
    listNomE[selectEleve[i].id.split('_')[2]] = selectEleve[i].innerHTML;
  };
  for (var i = selectProf.length - 1; i >= 0; i--) {
    if(selectProf[i].id == -1)
      continue;
    listNomP[selectProf[i].id.split('_')[2]] = selectProf[i].innerHTML;
  };
//  selectEleve.onchange = function(value){
//   if(this.selectedOptions[0].id != -1){
//     tableEleve.innerHTML += '<tr id="eleve_'+this.selectedOptions[0].id.split('_')[2]+'"><td>'+this.selectedOptions[0].innerHTML+'<img onclick="removeList(this.parentElement.parentElement)" src="../static/img/remove.png"/></td></tr></td></tr>';
//     listEleves.push(this.selectedOptions[0].value);
//     this.remove(this.selectedIndex);
//   }
  
//  }
//   selectProf.onchange = function(value){
//   if(this.selectedOptions[0].id != -1){
//     tableProf.innerHTML += '<tr id="prof_'+this.selectedOptions[0].id.split('_')[2]+'"><td>'+this.selectedOptions[0].innerHTML+'<img onclick="removeList(this.parentElement.parentElement)" src="../static/img/remove.png"/></td></tr></td></tr>';
//     listProfs.push(this.selectedOptions[0].value);
//     //this.remove(this.selectedIndex)
//   }
//   this.selectedIndex = -1;
// }
 var buttonEleve = document.getElementById('button_eleve');
 var buttonProf = document.getElementById('button_prof');

buttonEleve.onclick = function(data){
  var selectData = selectEleve.selectedOptions;
  for (var i = 0; i < selectData.length; i++) {
    if(selectData[i].id != -1){
    tableEleve.innerHTML += '<tr id="eleve_'+selectData[i].id.split('_')[2]+'"><td>'+selectData[i].innerHTML+'<img onclick="removeList(this.parentElement.parentElement)" src="../static/img/remove.png"/></td></tr></td></tr>';
    listEleves.push(selectData[i].value);
    selectData[i].parentNode.removeChild(selectData[i]);
    }
  };
  
}
buttonProf.onclick = function(data){
  var selectData = selectProf.selectedOptions;
  for (var i = 0; i < selectData.length; i++) {
    if(selectData[i].id != -1){
    tableProf.innerHTML += '<tr id="prof_'+selectData[i].id.split('_')[2]+'"><td>'+selectData[i].innerHTML+'<img onclick="removeList(this.parentElement.parentElement)" src="../static/img/remove.png"/></td></tr></td></tr>';
    listProfs.push(selectData[i].value);
    }
  };
}

function removeList(id){
    var which = id.id.split('_');
    var opt = document.createElement('option');
    opt.id = 'select_'+which[0]+'_'+which[1];
    opt.value = which[1];
    if(which[0] === 'eleve'){
        listEleves.splice(listEleves.indexOf(which[1]));
        opt.innerText = listNomE[which[1]];
        selectEleve.appendChild(opt);
    }
    else{
        listProfs.splice(listProfs.indexOf(which[1]));
    }

    id.remove();
}
</script>