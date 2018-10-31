<?php
include "includes/conexao.php";

if(isset($_POST['cadastrar'])){
	// botão cadastrar foi acionado, podemos inserir os dados
	$nome = addslashes($_POST['nome']);
	$email = $_POST['email'];
	$endereco = addslashes($_POST['endereco']);
	$bairro = $_POST['bairro'];
	$perfil = $_POST['perfil'];
	$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : "NC";
	$login = $_POST['login'];
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];
	
	$erros = array();

	if(empty($nome)){
		$erros[] = "O nome do cliente não pode ser vazio";
	}

	if(empty($email)){
		$erros[] = "O email não pode ser vazio";
	}

	if(empty($endereco)){
		$erros[] = "O endereço não pode ser vazio";
	}

	if(empty($bairro)){
		$erros[] = "Selecione um bairro";
	}	

	if(empty($perfil)){
		$erros[] = "Selecione um perfil";
	}		
	
	if($perfil == 'prestadordeservico' and empty($empresa)){
		$erros[] = "Prestadores de serviço devem inserir o nome da empresa";
	}
	
	if(empty($login)){
		$erros[] = "Insira um login";
	}
	
	if(empty($senha1)){
		$erros[] = "Insira a primeira senha";		
	}
	
	if(empty($senha2)){
		$erros[] = "Insira a segunda senha";
	}
	
	if($senha1 != $senha2){
		$erros[] = "A senha não confere";
	}
	
	if($senha1 == $senha2){
		$senha = md5($senha1);
	}

	if (count($erros) == 0){ // nenhum erro encontrado
		$sql = "INSERT INTO cliente (nome, email, endereco, bairro, perfil, nomeEmpresa, login, senha) VALUES ('$nome', '$email', '$endereco', '$bairro', '$perfil', '$empresa', '$login', '$senha')";
		$resultado = mysqli_query($conexao, $sql);	
	
		if($resultado){
			$mensagem = "Cliente cadastrado com sucesso!";
		}
		else{
			$mensgem = "Não foi possível cadastrar o cliente";
			$mensagem .= mysqli_error($conexao); // para debug
		}
	}//count erros
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Rent a Tool</title>
	<link rel="stylesheet" type="text/css" href="css/rent.css">
	<link rel="stylesheet" type="text/css" href="css/forms.css">
	<link rel="stylesheet" type="text/css" href="css/produto_carrinho.css">	
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> <!-- web font Lobster -->
</head>
<body>
	<!-- cabeçalho -->
	<header>
		<h1>Rent a Tool</h1>

		<p id="exibeMenu">Menu</p>
		<nav class="menu-opcoes">    
			<ul>
				<li><a href="#">Minha Conta</a></li>
				<li><a href="#">Programa de pontos</a></li>
				<li><a href="#">Consumo solidário</a></li>
				<li><a href="#">Quem somos</a></li>
				<li><a href="#">Ajuda</a></li>
			</ul>
		</nav>
	</header>
	<!-- fim cabeçalho -->



		<div class="container">
		<?php
			include "includes/layout/menuLateral.php";
		?>
			
			<section class="col-2">	
				<h2>Cadastre-se</h2>
					
					<?php
					if(isset($mensagem)){
						echo "<p>$mensagem</p>";
						echo "<p><a href='login.php'>Ir para a tela de login!</a></p>";
					}
					else{ // carrega form
						if(isset($erros)){
							echo "<ul>";
							foreach ($erros as $erro){
								echo "<li style='color: red;'>$erro</li>";
							}
							echo "</ul>";
						}
					?>
				
						<form action="" method="post" id="form-contato">
							<div class="form-item">
							  <label for="nome" class="label-alinhado">Nome:</label>
							  <input type="text" id="nome" name="nome" size="50" placeholder="Nome completo" value=<?=isset($_POST['nome']) ? $_POST['nome'] : '';?>>
							  <span class="msg-erro" id="msg-nome"></span>
							</div>
							
							<div class="form-item">
							  <label for="email" class="label-alinhado">E-mail:</label>
							  <input type="email" id="email" name="email" placeholder="fulano@dominio" size="50" value=<?=isset($_POST['email']) ? $_POST['email'] : '';?>>
							  <span class="msg-erro" id="msg-email"></span>
							</div>					    
							
							<div class="form-item">
							  <label for="endereco" class="label-alinhado">Endereço:</label>
							  <input type="text" id="endereco" name="endereco" placeholder="Rua, número, complemento" size="50" value=<?=isset($_POST['endereco']) ? $_POST['endereco'] : '';?>>
							  <span class="msg-erro" id="msg-endereco"></span>
							</div>	
							
							<div class="form-item">
							  <label for="bairro" class="label-alinhado">Bairro:</label>
							  <select name="bairro" id="bairro">
								<option value="">Selecione o bairro</option>
								
								<?php
								echo "<option value='Centro'";
											if(isset($_POST['bairro'])){
												if($_POST['bairro'] == 'Centro')  
												  echo " selected";	
											}	  
											echo ">Centro</option>";

								echo "<option value='Efapi'";
											if(isset($_POST['bairro'])){
												if($_POST['bairro'] == 'Efapi')  
												  echo " selected";	
											}	  
											echo ">Efapi</option>";
											
								echo "<option value='PresidenteMedici'";
											if(isset($_POST['bairro'])){
												if($_POST['bairro'] == 'PresidenteMedici')  
												  echo " selected";	
											}	  
											echo ">Presidente Medici</option>";																			

								echo "<option value='JardimItalia'";
											if(isset($_POST['bairro'])){
												if($_POST['bairro'] == 'JardimItalia')  
												  echo " selected";	
											}	  
											echo ">Jardim Italia</option>";

								echo "<option value='MariaGoretti'";
											if(isset($_POST['bairro'])){
												if($_POST['bairro'] == 'MariaGoretti')  
												  echo " selected";	
											}	  
											echo ">Maria Goretti</option>";
								
								?>
							  </select>
							  <span class="msg-erro" id="msg-bairro"></span>
							</div>
							
							<div class="form-item">
							  <label class="label-alinhado">Perfil:</label>
							  <?php
								if(isset($_POST['perfil'])){
									$perfil = $_POST['perfil'];
								}
								else{
									$perfil = NULL;
								}
							  ?>
							  
							  
							  <label><input type="radio" name="perfil" value="consumidorfinal" id="perfilC" <?=($perfil == 'consumidorfinal') ? "checked" : '';?>>Consumidor final</label>
							  <label><input type="radio" name="perfil" value="prestadordeservico" id="perfilP" <?=($perfil == 'prestadordeservico') ? "checked" : '';?>>Prestador de serviço</label>
							  <span class="msg-erro" id="msg-perfil"></span>
							</div>
						   
							<div class="form-item">
							  <label for="empresa" class="label-alinhado">Nome da empresa:</label>
							  <input type="text" id="empresa" name="empresa" disabled value=<?=isset($_POST['empresa']) ? $_POST['empresa'] : '';?>> <span id="mensagem-empresa"></span>
							  <span class="msg-erro" id="msg-empresa"></span>
							</div>					    
							
							<div class="form-item">
							  <label for="senha" class="label-alinhado">Login:</label>
							  <input type="text" id="login" name="login" placeholder="Mínimo 6 caracteres" value=<?=isset($_POST['login']) ? $_POST['login'] : '';?>>
							  <span class="msg-erro" id="msg-login"></span>
							</div>				    
							
							<div class="form-item">
							  <label for="senha" class="label-alinhado">Senha:</label>
							  <input type="password" id="senha1" name="senha1" placeholder="Mínimo 6 caracteres" value=<?=isset($_POST['senha1']) ? $_POST['senha1'] : '';?>>
							  <span class="msg-erro" id="msg-senha"></span>
							</div>
							
							<div class="form-item">
							  <label for="senha2" class="label-alinhado">Repita a Senha:</label>
							  <input type="password" id="senha2" name="senha2" placeholder="Mínimo 6 caracteres" value=<?=isset($_POST['senha2']) ? $_POST['senha2'] : '';?>>
							  <span class="msg-erro" id="msg-senha2"></span>
							</div>				     			    
							
							<div class="form-item">
							  <label class="label-alinhado"></label>
							  <label><input type="checkbox" id="concordo" name="concordo"> Li e estou de acordo com os termos de uso do site</label>
							  <span class="msg-erro" id="msg-concordo"></span>
							</div>				    
							
							<div class="form-item">
								<label class="label-alinhado"></label>
							<input type="submit" id="botao" value="Confirmar" name="cadastrar">
							</div>
						</form>		
						
						<?php
						}//fecha else
						?>
						
			</section>
			
			<?php
				include "includes/layout/maisPedidos.php";
			?>	
			<!-- fim area central -->

		</div>
		
<?php
include "includes/layout/rodape.php";
?>	
