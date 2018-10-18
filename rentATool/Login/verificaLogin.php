<?php
	$sql="select id, nome, senha from cliente where nome=$_POST['login'] and senha=md5($_POST['senha'])";
	$resultado = mysqli_query($conexao, $sql);
	$login = mysqli_fetch_array($resultado);
			
	if($_POST['login'] != $login['nome']){
		header("Location: login.php?erro=1");
	}
	else{
		if(md5($_POST['senha']) != $login['senha']){
			header("Location: login.php?erro=2");
		}
		else{ // login e senha corretos
			session_start(); // abre uma nova sessao
			$_SESSION['login'] = $_POST['login']; // armazena login na sessao
			$_SESSION['inicio'] = date("H:i:s"); // armazena horario na sessao
			header("Location: index.php");
		}
	}
?>
