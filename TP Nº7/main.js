var piso = "";
var departamento = "";

function show (num){
	if (piso.length == 2 && departamento.length == 1) {
		return;
	}
	if (piso.length <2) {
		piso=piso+num;
		document.getElementById("piso").value=piso;
	}
	else if (departamento.length <1) {
		departamento=departamento+num;
		document.getElementById("departamento").value=departamento;
		document.getElementById("llamar").disabled=false;
	}
}


function call(){
	

	if(document.getElementById("piso").value>48){
		document.getElementById("visor").value = "El Piso marcado no existe";
	}
	else if (document.getElementById("departamento").value<1 || document.getElementById("departamento").value>6) {
		document.getElementById("visor").value = "El Departamento marcado no existe";
	}
	else if (document.getElementById("piso").value>48 && (document.getElementById("departamento").value<1 || document.getElementById("departamento").value>6))  {
		document.getElementById("visor").value = "El Departamento y Piso marcados no existen";
	}
	else{
	document.getElementById("visor").value = "Llamando al Piso: "+piso+" | Departamento: "+departamento;
	}
}

function delet(){
	piso = "";
	departamento= "";
	document.getElementById("piso").value = "";
	document.getElementById("departamento").value = "";
	document.getElementById("visor").value= "";
	document.getElementById("llamar").disabled=true;
}