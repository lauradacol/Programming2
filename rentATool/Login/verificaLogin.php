<?php
	include "../includes/conexao.php";

	$sql="select id, nome, login, senha from cliente where login={$_POST['login']} and senha=md5({$_POST['senhaUsuario']})";
	$resultado = mysqli_query($conexao, $sql);
	
	$login = mysqli_fetch_array($resultado);	

			
	if($_POST['login'] != 'laurad'){
		header("Location: login.php?erro=1");
	}
	else{
		if($_POST['senhaUsuario'] != 'lauralaura'){
			header("Location: login.php?erro=2");
		}
		else{ // login e senha corretos
			
			echo $login['login'];
			
			
			/*session_start(); // abre uma nova sessao
			$_SESSION['login'] = $_POST['login']; // armazena login na sessao
			$_SESSION['inicio'] = date("H:i:s"); // armazena horario na sessao
			header("Location: index.php");*/
		}
	}
?>
