<html>
	<head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <title>School Supplies</title>
            <script src="../static/js/core.js"></script>
            <link rel="stylesheet" href="../static/css/style.css">
            <link rel="stylesheet" href="../static/css/index.css">
	</head>
	<body>
		<div id="top_bar">
			<img src="../static/img/logo_moche.png" class="logo"/>
		</div>
		<div>
                    <div id="nav_bar">
                        <div class="item_navbar" id="accueil" onclick="navBarSelector(this.id)">
                           <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Accueil</span>
                        </div>
                        <div class="item_navbar" id="eleve" onclick="navBarSelector(this.id)">
                            <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Gestion des élèves</span>
                        </div>
                        <div class="item_navbar" id="graphique" onclick="navBarSelector(this.id)">
                            <span class="triangle_item_navbar"></span><span class="inside_item_navbar">Graphique</span>
                        </div>
                        <div class="item_navbar" id="toto" onclick="navBarSelector(this.id)">
                            <span class="triangle_item_navbar"></span><span class="inside_item_navbar">blabla</span>
                        </div>
                    </div>
                    <div class="body_write">
                        <!-- include your text here -->
                        <div id="include_html_here">
                           <?php
                               $tab = filter_input(INPUT_GET, 'tab');;
                                switch ($tab) {
                                    case 'accueil':
                                        include 'accueil.php';
                                        break;
                                    case 'eleve':
                                        include 'eleve.php';
                                        break;
                                    case 'graphique':
                                        include 'graphique.php';
                                        break;
                                    default:
                                        include 'accueil.php';
                                        break;
                                }
                                
                           ?>
                        </div>
                    </div>
                </div>
            <script type="text/javascript">
                window.onload = function(){
                    var dict = core.variableGET();
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