<?php
if(!isset($_GET['uf']) || !in_array($_GET['uf'], array("PR", "SC", "RS"))){
	die();
}
else {
	/*require_once "conexao.php";
	$sql = "select id, nomeCidade from cidade where uf= '$_GET[uf]' order by nomeCidade ";
	$resultado = mysqli_query($conexao, $sql);
	while ($dados = mysqli_fetch_assoc($resultado)){
		echo "<option value=\"$dados[id]\">$dados[nomeCidade]</option>";
	}*/
	if($_GET['uf'] == "PR"){
		echo "<option value='curitiba'>Curitiba</option>
		<option value='pato branco'>Pato Branco</option>
		<option value='londrina'>Londrina</option>";
	}
	elseif($_GET['uf'] == "SC"){
		echo "<option value='chapeco'>Chapecó</option>
		<option value='guatambu'>Guatambu</option>
		<option value='xaxim'>Xaxim</option>";
	}
	else {
		echo "<option value='poa'>Porto Alegre</option>
		<option value='erechim'>Erechim</option>
		<option value='cerro largo'>Cerro largo</option>";
    }
}
?>