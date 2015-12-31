"use strict";
var functions = {};

functions.clickDelete = function(id){
	var select = document.getElementsByClassName('selected_navbar')[0].id;
	var callback = function(data){
		document.getElementById(id).remove()
	}
	core.ajaxRequest('../controller/api_delete.php',callback, 'POST', 'select='+select+'&id='+id.substring(id.indexOf('_')+1) );
}

functions.clickAdd = function(id){
	var allInputs = document.getElementById('div_classe_col').getElementsByTagName('input');
	var allSelects = document.getElementById('div_classe_col').getElementsByTagName('select');
	var select = document.getElementsByClassName('selected_navbar')[0].id;
	var callback = function(data){
		location.reload();
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
	location.reload();
}

functions.clickAddClasses = function(id, listEleves, listProfs){
	var select = document.getElementsByClassName('selected_navbar')[0].id;
	var nomInput =document.getElementById('nom_classe');
	var niveau = document.getElementById('niveau');
	var string = nomInput.id+'='+nomInput.value
	var callback = function(data){
		console.log(data);
		//location.reload();
	}
	string += '&listEleves='+listEleves.toString();
	string += '&listProfs='+listProfs.toString();
	string += '&niveau='+niveau.value;
	string += '&select='+select;
	core.ajaxRequest('../controller/api_add.php',callback, 'POST', string);
	//location.reload();
}