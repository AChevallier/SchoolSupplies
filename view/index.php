<?php
session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: ../view/login.php');
    exit();
}
?>
<html>
	<head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <title>School Supplies</title>
            <script src="../static/js/core.js"></script>
            <script src="../static/js/function.js"></script>
            <link rel="stylesheet" href="../static/css/style.css">
            <link rel="stylesheet" href="../static/css/index.css">
	</head>
	<body>
		<div id="top_bar">
			<div id="deconnexion">
                <a href="../controller/api_disconnect.php">Se déconnecter <img src="../static/img/logout.png"/></a>
            </div>
            <img src="../static/img/logo_moche.png" class="logo"/>
		</div>
		<div>
            <div id="nav_bar">
                <div class="item_navbar" id="liste_generale" onclick="navBarSelector(this.id)">
                   <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Liste de fournitures</span>
                </div>
                <?php
                if ($_SESSION['estProfesseur'] == 1 || $_SESSION['isAdmin'] == 1){
                                    echo 
                '<div class="item_navbar" id="liste" onclick="navBarSelector(this.id)">
                    <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Création de votre liste</span>
                </div>';
                }
                ?>
               
            <?php 
                if ($_SESSION['isAdmin'] == 1)
                {
                    echo 
                '<div class="item_navbar" id="personne" onclick="navBarSelector(this.id)">
                    <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Gestion des personnes</span>
                </div>
                <div class="item_navbar" id="classe" onclick="navBarSelector(this.id)">
                    <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Gestion des classes</span>
                </div>
                <div class="item_navbar" id="matiere" onclick="navBarSelector(this.id)">
                    <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Gestion des matières</span>
                </div>
                <div class="item_navbar" id="fourniture" onclick="navBarSelector(this.id)">
                    <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Gestion des fournitures</span>
                </div>';
                }
            ?>
                
                <div class="item_navbar" id="graphique" onclick="navBarSelector(this.id)">
                    <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Graphique</span>
                </div>
                <div class="item_navbar profile" id="profile" onclick="navBarSelector(this.id)">
                    <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Mon Profil</span>
                </div>
            </div>
            <div class="body_write">
                <!-- include your text here -->
                <div id="include_html_here">
                   <?php
                       $tab = filter_input(INPUT_GET, 'tab');;
                        switch ($tab) {
                            case 'liste_generale':
                                include 'liste_generale.php';
                                break;
                            case 'personne':
                                include 'personne.php';
                                break;
                            case 'classe':
                                include 'classe.php';
                                break;
                            case 'matiere':
                                include 'matiere.php';
                                break;
                            case 'fourniture':
                                include 'fourniture.php';
                                break;
                            case 'graphique':
                                include 'graphique.php';
                                break;
                            case 'profile':
                                include 'profile.php';
                                break;
                            case 'liste':
                                include 'liste.php';
                                break;
                            default:
                                include 'liste_generale.php';
                                break;
                        }
                        
                   ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.onload = function(){
                var dict = core.variableGET();
                if(dict === null)
                    var selected_page = document.getElementById('list');
                else
                    var selected_page = document.getElementById(dict.tab);
                selected_page.classList.add('selected_navbar')
                var includeHtml = document.getElementById('include_html_here');
            }
            var navBarSelector = function(page){
                window.location.href = 'index.php?tab='+page;
            }
        </script>
	</body>
</html>