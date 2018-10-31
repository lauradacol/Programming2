document.getElementById("nome_fam").onchange = function(){
	var idFamilia = "nome_fam".val();
		
	$.ajax({
		url: 'pegaGenero.php',
		type: 'POST',
		data:{id:idFamilia},
		beforeSente: function(){
			$("#nome_gen").css({'display':'block'});
			$("#nome_gen").html("Carregando gêneros...");
		},
		sucess: function(data){
			$("#nome_fam").css({'display':'block'});
			$("#nome_fam").html(data);
		},
		error: function(data){
			$("#nome_fam").css({'display':'block'});
			$("#nome_fam").html("Houve um erro ao carregar os gêneros");			
		}
			
	});
}

