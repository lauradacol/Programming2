<?php
	if($_POST['login'] != 'admin'){
		header("Location: login.php?erro=1");
	}
	else{
		if($_POST['senha'] != '1234'){
			header("Location: login.php?erro=2");
		}
		else{ // login e senha corretos
			session_start(); // abre uma nova sessao
			$_SESSION['login'] = $_POST['login']; // armazena login na sessao
			$_SESSION['inicio'] = date("H:i:s"); // armazena horario na sessao
			header("Location: restrito.php");
		}
	}
?>