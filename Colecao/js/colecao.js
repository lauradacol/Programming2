function updateTombo(){
	var tombo = parseFloat(document.getElementById("numerotombo").innerHTML);
		
	document.getElementById("numerotombo").innerHTML = tombo + 1;
}

function displayDate(){
	var acesso = new Date();
	
	document.getElementById("acesso").innerHTML = "Último acesso em:" +  acesso;
}
