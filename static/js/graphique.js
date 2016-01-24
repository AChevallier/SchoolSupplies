"use strict";
var maximum = 0;
for (var i = data.length - 1; i >= 0; i--) {
	 if( maximum < data[i].quantite)
	 	maximum = data[i].quantite
};
document.getElementById('max').innerHTML = maximum;
var color = ['red', 'green', 'deepskyblue', 'yellow', 'firebrick', 'cyan', 'azure', 'chocolate', 'slategrey']

function addA(data){
	var table = document.getElementsByTagName('table')[0];
	var table2 = document.getElementsByTagName('table')[1];
	var trLibel = document.getElementById('libel')
	for (var i = 1; i <= maximum; i++) {
		var tr = document.createElement("tr");
		tr.classList.add('graph');
		for (var y = 0; y < data.length; y++) {
			var td = document.createElement("td");
			if(y == 0){
				td.classList.add('axeY');
			}
			if( maximum-data[y].quantite < i ){
				td.style.backgroundColor = color[y];
			}
			if( maximum-data[y].quantite == i ){
				var tdText = document.createTextNode(data[y].quantite);
				td.appendChild(tdText);
			}
			if( i === maximum-1){
				var tdLibel = document.createElement('td');
				tdLibel.classList.add('libelle')
				var textLibel = document.createTextNode(data[y].nom);
				tdLibel.appendChild(textLibel);
				trLibel.appendChild(tdLibel);
			}
			tr.appendChild(td);
		}
		table.appendChild(tr);
	}
	table2.style.width = table.offsetWidth;
}
addA(data);