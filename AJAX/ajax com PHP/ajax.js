function loadCities() {
  	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText != ""){
				document.getElementById("cidade").innerHTML = "<option value=''>--- Selecione ---</option>";
				document.getElementById("cidade").innerHTML += this.responseText;
				document.getElementById("cidade").disabled = "";
			}
			else {
				document.getElementById("cidade").innerHTML = "<option value=''>--- Selecione o estado ---</option>";
				document.getElementById("cidade").disabled = "disabled";
			}					
		}
	};
	uf = document.getElementById("uf").value;
	xhttp.open("GET", "buscaCidades.php?uf=" + uf, true);
	xhttp.send();
}
