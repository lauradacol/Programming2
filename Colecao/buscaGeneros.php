<?php
include "includes/conexao.php";
/*
$sql = "select * from genero where id_fam = $_GET['id_fam']";	
$resultado = mysqli_query($conexao, $sql);
$genero = mysqli_fetch_array($resultado);


if(!isset($_GET['id_fam']) || !in_array($_GET['id_fam'], $genero['id_fam'])){
	die();
}
else {*/
	$sql = "select id_gen, nome_gen from genero where id_fam = $_GET['id_fam'] order by nome_gen;
	$resultado = mysqli_query($conexao, $sql);
	echo "$resultado";
	while ($generos = mysqli_fetch_assoc($resultado)){
		echo "<option value=\"$generos['id_gen']\">$generos['nome_gen']</option>";
	}
	
	/*
	if($_GET['id_fam'] == 4){
		echo "<option value='curitiba'>Curitiba</option>
		<option value='pato branco'>Pato Branco</option>
		<option value='londrina'>Londrina</option>";
	}
	else{
		echo "<option value='chapeco'>Chapecó</option>
		<option value='guatambu'>Guatambu</option>
		<option value='xaxim'>Xaxim</option>";
	}
    
}*/
?>
