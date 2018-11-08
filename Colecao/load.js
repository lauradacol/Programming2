function loadGeneros() {
  	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText != ""){
				document.getElementById("nome_gen").innerHTML = "<option value=''>Selecione</option>";
				document.getElementById("nome_gen").innerHTML += this.responseText;
				document.getElementById("nome_gen").disabled = "";
			}
			else {
				document.getElementById("nome_gen").innerHTML = "<option value=''>Selecione uma gênero</option>";
				document.getElementById("nome_gen").disabled = "disabled";
			}					
		}
	};
	id_fam = document.getElementById("id_fam").value;
	xhttp.open("GET", "buscaGeneros.php?id_fam=" + id_fam, true);
	xhttp.send();
}

