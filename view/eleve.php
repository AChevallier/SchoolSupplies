<link href="../static/css/eleve.css" rel="stylesheet" type="text/css"/>
<div>
    <div id="add_pupils"><img onclick="collapsble('add_pupils_col')" src="../static/img/plus.png" id="icon_add_pupils"/>Ajouter un élève</div>
    <div id="add_pupils_col" style="display:none;">ljksqdhfkdjsfhskldjhflsdkqjfhslqkdjfhqsldk</div>
</div>
<script type="text/javascript">
    function collapsble(div_col){
        var divCol = document.getElementById(div_col);
        var imgSrc = document.getElementById('icon_add_pupils');
        if(divCol.style.display === 'none'){
            divCol.style.display = "block";
            imgSrc.src = "../static/img/minus.png"
        }
        else{
            divCol.style.display = "none";
            imgSrc.src = "../static/img/plus.png"
        }
    }
</script>