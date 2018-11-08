<?php
	include "includes/conexao.php";

	$sql = "select login from cliente where login='{$_POST['loginUsuario']}'";
	$resultado = mysqli_query($conexao, $sql);
	$login = mysqli_fetch_array($resultado);
	
	if($login){	
		
		$sqlSenha = "select id, nome, login, endereco, senha from cliente where senha=md5('{$_POST['senhaUsuario']}')";
		$resultadoSenha = mysqli_query($conexao, $sqlSenha);
		$loginSenha = mysqli_fetch_array($resultadoSenha);
		
		if($loginSenha){
			
			session_start(); // abre uma nova sessao
			$_SESSION['login'] = $_POST['loginUsuario']; // armazena login na sessao
			$_SESSION['inicio'] = date("H:i:s"); // armazena horario na sessao
			$_SESSION['nome'] = $loginSenha['nome'];
			$_SESSION['id'] = $loginSenha['id'];			
			$_SESSION["endereco"] = $loginSenha["endereco"].", ".$loginSenha['bairro'];			
			header("Location: index.php");					
		}
		
		else{
			header("Location: login.php?erro=2");
		}		
	}
		
	else{
		header("Location: login.php?erro=1");
	}
	
	
	
?>
