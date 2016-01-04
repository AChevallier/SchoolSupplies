<?php 
    require("../controller/api_connect_db.php");
    $result;
    switch ($_POST['filter']) {
            case 'all':
                    $result = $bdd->query("SELECT id,nom, prenom, dateNaissance, estProfesseur, login FROM personne;");
                    break;
            case 'eleve':
                    $result = $bdd->query("SELECT id,nom, prenom, dateNaissance, estProfesseur, login FROM personne WHERE estProfesseur = 0;");
                    break;
            case 'prof':
                    $result = $bdd->query("SELECT id,nom, prenom, dateNaissance, estProfesseur, login FROM personne  WHERE estProfesseur = 1;");
                    break;
            default:
                    $result = $bdd->query("SELECT id,nom, prenom, dateNaissance, estProfesseur, login FROM personne;");
                    break;
    }
    $string = '';
    foreach ($result as $row) {
      if($row['estProfesseur'] == 1){
        $prof = 'checked="checked"';
      }
      else{
        $prof = '';
      }
      $string .='<tr id="matiere_'.$row['id'].'">';
      $string .='<td style="width:10px;"><input type="checkbox"></input></td>';
      $string .='<td>'.$row['id'].'</td>';
      $string .='<td>'.$row['nom'].'</td>';
      $string .='<td>'.$row['prenom'].'</td>';
      $string .='<td>'.$row['dateNaissance'].'</td>';
      $string .='<td><input disabled type="checkbox" '.$prof.'></input></td>';
      $string .='<td>'.$row['login'].'</td>';
      $string .='<td><img onclick="" src="../static/img/parameter.png"/> <img onclick="functions.clickDelete(this.parentElement.parentElement.id)" src="../static/img/remove.png"/></td>';
      $string .='</tr>';
    }
    print($string);
?>