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
