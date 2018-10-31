<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Rent a Tool</title>
	<link rel="stylesheet" type="text/css" href="css/rent.css">
	<link rel="stylesheet" type="text/css" href="css/forms.css">	
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> <!-- web font Lobster -->
</head>
<body>
	<!-- cabeçalho -->
	<header>
		<h1>Rent a Tool</h1>		
	</header>
	<!-- fim cabeçalho -->

	<!-- area central com 3 colunas -->
	<div class="login">		
		<div class="box">
			<h2>Acesso</h2>
			<form action="verificaLogin.php" method="post">
				<label for="loginUsuario" class="login-alinhado">Login:</label>
				<input type="text" name="loginUsuario"><br>
				<label for="senhaUsuario" class="login-alinhado">Senha:</label>
				<input type="password" name="senhaUsuario"><br>	
			
				<div style="color: red">
					<?php
					if(isset($_GET['erro'])){
						if($_GET['erro'] == 1){
							echo "Login incorreto";
						}
						elseif($_GET['erro'] == 2)
							echo "Senha incorreta";
					}				
					?>
				</div>
				<input type="submit" value="Entrar">
			</form>			
			
			<div class="querocadastrar">
				<p><a href="cad_cliente.php">Quero me cadastrar</a></p>
				<p><a href="#">Esqueci minha senha</a></p>
			</div>
		</div>			
	</div>	

<?php
include "includes/layout/rodape.php";
?>	
