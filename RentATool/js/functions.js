document.getElementById("fechar").onclick = function(){
	document.getElementById("ajuda").style.display = "none";	
};

document.getElementById("exibeMenu").onclick = function(){
	var menu = document.getElementsByClassName("menu-opcoes")[0];
	if(menu.style.display == 'none')
		menu.style.display = 'block';
		
	else
		menu.style.display = 'none'; 
};
