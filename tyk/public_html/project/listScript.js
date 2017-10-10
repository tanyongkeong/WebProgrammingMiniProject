function addRow(list){

	var table = document.getElementById("studentTable");
	var tr = document.createElement("tr");

	for (x in list){
		var td = document.createElement("td");
		td.style.width = '20%';
		td.innerHTML = list[x];
		tr.appendChild(td);
	}
	var td = document.createElement("td");
	var btn = document.createElement("BUTTON");
	btn.setAttribute("type","button");
	btn.innerHTML = "View";
	btn.onclick  = function(){alert("View")};
	td.appendChild(btn);
	tr.appendChild(td);
	table.appendChild(tr);
}

