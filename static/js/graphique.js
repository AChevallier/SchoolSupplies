"use strict";

var data = [{'nom':'toto', 'value':4}, {'nom':'tutu', 'value':5}, {'nom':'alal', 'value':3}];

var color = ['red', 'green', 'deepskyblue', 'yellow']

function addA(data){
	var table = document.getElementsByTagName('table')[0];
	for (var i = 0; i <= 11; i++) {
		var tr = document.createElement("tr");
		for (var y = 0; y < data.length; y++) {
			var td = document.createElement("td");
			if(y == 0){
				td.classList.add('axeY');
			}
			if( 10-data[y].value < i ){
				td.classList.add(color[y]);
			}
			tr.appendChild(td);
		}
		table.appendChild(tr);
	}
}
addA(data)