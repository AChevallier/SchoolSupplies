"use strict";
var functions = {};

functions.clickDelete = function(id){
	var select = document.getElementsByClassName('selected_navbar')[0].id;
	var callback = function(data){
		document.getElementById(id).remove()
	}
        var ids;
        if(select == 'affectation_classe'){
            var idBefore = id.substring(0,id.indexOf("_"));
            var idAfter = id.substring(id.indexOf('_')+1);
            ids = 'idB='+idBefore+'&idA='+idAfter;
        }
        else{
            ids = 'id='+id.substring(id.indexOf('_')+1);
        }
	core.ajaxRequest('../controller/api_delete.php',callback, 'POST', 'select='+select+'&'+ids );
}

functions.clickAdd = function(id){
	var allInputs = document.getElementById('div_classe_col').getElementsByTagName('input');
	var allSelects = document.getElementById('div_classe_col').getElementsByTagName('select');
	var select = document.getElementsByClassName('selected_navbar')[0].id;
	var callback = function(data){
            var json = JSON.parse(data);
            console.log(data)
            if(json.length === 0){
                location.reload();
            }
            else{
            for(var key in json){
                    document.getElementById('erreur_'+key).innerHTML = json[key];
                }
            }
	}
	var string = '';
	if(allInputs.length > 0){
		for (var i = allInputs.length - 1; i >= 0; i--) {
			if(allInputs[i].id === 'submit')
				continue;
			if(allInputs[i].type === 'checkbox')
			{
				var check = allInputs[i].checked;
				string += allInputs[i].id+'='+ (check ? 1 : 0);
			}
			else{
				string += allInputs[i].id+'='+allInputs[i].value;
			}		
			if(i !== + 0)
				string +='&';
		};
	}
	if(allSelects.length > 0){
		for (var i = allSelects.length - 1; i >= 0; i--) {

			string += '&'+allSelects[i].id+'='+allSelects[i].value;
			if(i !== + 0)
				string +='&';
		};
	}
	string += '&select='+select;
	core.ajaxRequest('../controller/api_add.php',callback, 'POST', string);
}

functions.clickAddClasses = function(id, listEleves, listProfs){
	var select = document.getElementsByClassName('selected_navbar')[0].id;
	var nomInput =document.getElementById('nom_classe');
	var niveau = document.getElementById('niveau');
	var string = nomInput.id+'='+nomInput.value
	var callback = function(data){
		for(var key in data){
                    document.getElementById('erreur_'+key).innerHTML = data[key];
                }
	}
	string += '&listEleves='+listEleves.toString();
	string += '&listProfs='+listProfs.toString();
	string += '&niveau='+niveau.value;
	string += '&select='+select;
	core.ajaxRequest('../controller/api_add.php',callback, 'POST', string);
	//location.reload();
}

functions.clickModif = function(idBdD){
    var select = document.getElementsByClassName('selected_navbar')[0].id;
    var thisTd = document.getElementById(idBdD).childNodes;
    var id = idBdD.substring(idBdD.indexOf('_')+1);
    
    for(var i= 0; i <= thisTd.length-1; i++){
        if(i >= 2 && i < thisTd.length-1)
        {
            var input = document.createElement("input");
            input.value = thisTd[i].innerText;
            input.size = thisTd[i].innerText.length -1;
            input.type = 'text';
            input.id = 'input_'+thisTd[i].id;
            thisTd[i].innerText = '';
            thisTd[i].appendChild(input);
        }
        if( i == thisTd.length - 1){
            thisTd[i].innerText = '';
            var oImg=document.createElement("img");
            oImg.setAttribute('src', '../static/img/validate.png');
            oImg.onclick = callAjaxValidate;
            thisTd[i].appendChild(oImg);
        }
    }
    
    function callAjaxValidate(){
        var tr = this.parentElement.parentElement.childNodes;
        var string = 'select='+select+'&';
        for (var i = tr.length - 1; i >= 0; i--) {
            if(tr[i].childNodes[0].type === 'text'){
                string += tr[i].id+'='+tr[i].childNodes[0].value;	
                if(i !== + 0)
                    string +='&';
            }   
        }
        //core.ajaxRequest('../controller/page_modif.php',callback, 'POST', string);
        console.log(string)
    }
    var callback = function(data){
        location.reload();
    }
    console.log(select+'||'+id);
}
