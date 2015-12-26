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
	console.log(allInputs)
	var string = '';
	for (var i = allInputs.length - 1; i >= 0; i--) {
		if(allInputs[i].id === 'submit')
			continue;
		if(allInputs[i].type === 'checkbox')
		{
			var check = allInputs[i].checked;
			string += allInputs[i].id+'='+ check ? true : false;
		}
		else{
			string += allInputs[i].id+'='+allInputs[i].value;
		}		
		if(i !== + 0)
			string +='&';
	};
	for (var i = allSelects.length - 1; i >= 0; i--) {

		string += '&'+allSelects[i].id+'='+allSelects[i].value;
		if(i !== + 0)
			string +='&';
	};
	string += '&select='+select;
	core.ajaxRequest('../controller/api_add.php',callback, 'POST', string);
	location.reload();
}