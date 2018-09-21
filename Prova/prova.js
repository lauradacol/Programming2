function changeValor(){
	var valor = parseFloat(document.getElementById("valor").value);
	var total = parseFloat(document.getElementById("total").innerHTML);
	
	document.getElementById("total").innerHTML = total + valor;
}

function changeDesc(){
	var desc = parseFloat(document.getElementById("desc").value);
	var total = parseFloat(document.getElementById("total").innerHTML);
	
	document.getElementById("total").innerHTML = total - desc;
}

function nomeEmpty(){
	if (document.getElementById("nome").value == ""){
		return "Preencher nome!\n";
		/*alert("Preencher campo nome!");		*/
	}	
	else{
		return "";
	}
}

function descricaoEmpty(){
	if(document.getElementById("descricao").value == ""){
		return "Preencher descrição!\n";	
	}
	else{
		return "";
	}	
}

function quantidadeEmpty(){
	if(valor = document.getElementById("quantidade").value){
		return false;
	}	
}

function valorEmpty(){
	if(valor = document.getElementById("valor").value){
		return false;
	}
}

function descEmpty(){
	if(valor = document.getElementById("desc").value){
		return false;
	}
}

function isEmpty(){
	alert(nomeEmpty() + descricaoEmpty());
	
}
