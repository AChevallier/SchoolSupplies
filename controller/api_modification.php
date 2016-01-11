<?php
    require("../controller/api_connect_db.php");

    $query = "UPDATE FROM ".$_POST['select']." WHERE id = ".$_POST['id'].";";
    echo $query;
    $count = $bdd->exec($query);

    print 'ok ='.$count;
?>