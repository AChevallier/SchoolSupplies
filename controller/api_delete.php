<?php
    require("../controller/api_connect_db.php");
    if( $_POST['select'] == 'classe'){
            $query = "DELETE FROM link_eleve WHERE classe_id = ".$_POST['id'].";";
            echo $query;
            $count = $bdd->exec($query);
            $query = "DELETE FROM link_prof WHERE classe_id = ".$_POST['id'].";";
            echo $query;
            $count = $bdd->exec($query);
            $query = "DELETE FROM ".$_POST['select']." WHERE id = ".$_POST['id'].";";
            echo $query;
            $count = $bdd->exec($query);
    }
    elseif($_POST['select'] == 'affectation_classe'){
        $query = "DELETE FROM affectation_classe WHERE prof_id = ".$_POST['idB']." AND matiere_id = ".$_POST['idA'].";";
        echo $query;
        $count = $bdd->exec($query);
    }
    else{
            $query = "DELETE FROM ".$_POST['select']." WHERE id = ".$_POST['id'].";";
            echo $query;
            $count = $bdd->exec($query);
    }
    print 'ok ='.$count;
    $bdd = null;
?>