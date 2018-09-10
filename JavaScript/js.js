/*o evento foi vinculado através do atributo onclick*/
function displayDate(){
	document.getElementById("exemplo2").innerHTML = Date();
}

/*vinculando evento pelo javascript*/
document.getElementById("botao3").onclick = displayDate3;

function displayDate3(){
	document.getElementById("exemplo3").innerHTML = Date();	
}
