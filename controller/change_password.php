<?php
session_start();
require("../controller/api_connect_db.php");
$req = $bdd->prepare('UPDATE personne SET password = :pw1 WHERE id = :id;');
$req->execute(array(
                    'pw1' => $_POST["pw1"],
                    'id' => $_SESSION['id']
                    ));
header('Location: index.php');
?>