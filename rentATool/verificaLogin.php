<?php
	include "includes/conexao.php";

	echo $sql="select id, nome, login, senha from cliente where login='{$_POST['loginUsuario']}' and senha=md5('{$_POST['senhaUsuario']}')";
	$resultado = mysqli_query($conexao, $sql);
	
	$login = mysqli_fetch_array($resultado);	
				
	if($_POST['loginUsuario'] != $login['login']){
		header("Location: login.php?erro=1");
	}
	else{
		if(md5($_POST['senhaUsuario']) != $login['senha']){
			header("Location: login.php?erro=2");
		}
		else{ // login e senha corretos
	
			session_start(); // abre uma nova sessao
			$_SESSION['login'] = $_POST['loginUsuario']; // armazena login na sessao
			$_SESSION['inicio'] = date("H:i:s"); // armazena horario na sessao
			$_SESSION['nome'] = $login['nome'];
			header("Location: index.php");
		}
	}
?>
