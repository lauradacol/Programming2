<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Área de Administração - Rent a Tool</title>
	<link rel="stylesheet" type="text/css" href="../css/rent.css">
	<link rel="stylesheet" type="text/css" href="../css/adm.css">
	<link rel="stylesheet" type="text/css" href="../css/forms.css">	
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> <!-- web font Lobster -->
</head>
<body>
	<!-- cabeçalho -->
	<header>
		<h1><a href="index.php">Administração do site</a></h1>
		<h1>Rent a Tool</h1>
	</header>
    <nav class="navbar">
      <ul>
        <li>
          <a href="#">Página inicial</a>
        </li>
        <li>
          <a href="#">Produtos</a>
        </li>
        <li>
          <a href="#">Clientes</a>
        </li>
        <li>
          <a href="#">Pedidos</a>
        </li>
        <li>
          <a href="#">Log off</a>
        </li>
      </ul>
    </nav>

		<div class="container">
			<main>
				<h2>Cadastro de Produtos</h2>
				<form action="" method="post" id="form-cadastro">
					<div>
						<fieldset>
							<legend><strong>Dados do Produto</strong></legend>
							<div class="form-item">
								<label for="nome" class="label-alinhado">Nome:</label>
								<input type="text" id="nome" name="nome" size="50" required autofocus>								
							</div>
							
							<div class="form-item">
								<label for="fabricante" class="label-alinhado">Fabricante:</label>
									<select name="fabricante" id="fabricante">
										<option value="">Selecione o fabricante</option>
										<option>Bosch</option>
										<option>Makita</option>
										<option>Trapp</option>
										<option>De Waltt</option>
									</select>
							</div>
							
							<div class="form-item">
								<label for="arquivo" class="label-alinhado">Selecione uma imagem:</label>
								<input type="file" name="arquivo" id="arquivo">
							</div>

							<div class="form-item">
								<label for="desc" class="label-alinhado">Descrição:</label>
								<textarea name="descricao" rows="5" cols="30" id="desc"></textarea>
							</div>
							<div class="form-item">
								<label class="label-alinhado">Tensão: </label>
								<label><input type="radio" name="tensao" value="110" id="volt110">110v</label>
								<label><input type="radio" name="tensao" value="220" id="volt220">220v</label>							
								<label><input type="radio" name="tensao" value="0" id="voltNone" checked>Não se aplica</label>
							</div>
							<div class="form-item">
								<label class="label-alinhado">Categorias:</label>
								<label><input type="checkbox" id="marcenaria" name="marcenaria">Marcenaria</label>
								<label><input type="checkbox" id="jardinagem" name="jardinagem">Jardinagem</label>
								<label><input type="checkbox" id="limpeza" name="limpeza">Limpeza</label>
								<label><input type="checkbox" id="escritorio" name="escritorio">Escritório</label>
								<label><input type="checkbox" id="mecanica" name="mecanica">Mecânica</label>
								<label><input type="checkbox" id="outros" name="outros">Outros</label>
							</div>						
						</fieldset>
						<fieldset>
							<legend><strong>Dados da locação</strong></legend>
							<div class="form-item">
								<label for="qntDis" class="label-alinhado">Quantidade Disponível:</label>
								<input type="number" id="quantidade" name="qiantidade" value="1" min="1">
							</div>
							<div class="form-item">
								<label for="valor" class="label-alinhado">Valor da locação:</label>
								<input type="text" id="valor" name="valor" placeholder="0.00">
							</div>
							<div class="form-item">
								<label for="desconto" class="label-alinhado">Desconto promocional (%):</label>
								<input type="text" id="desconto" name="desconto" value="0.00">
							</div>
							<div class="form-item">						
								<label for="total" class="label-alinhado">Total:</label>
								<div id="total">0.00</div>
							</div>

							<div class="form-item">
						    	<label class="label-alinhado"></label>
						    	<input type="submit" id="botao" value="Cadastrar" name="cadastrar">
						    	<input type="reset" value="Limpar">
						    </div>						
						</fieldset>
					</div>
				</form>
			</main>	
			<aside>
				<ul class='itens'>
					<li>Total de Produtos: 150</li>
					<li>Locados: 99</li>
					<li>Disponíveis: 51</li>
				</ul>
			</aside>
		
		</div>
		<section class="ultimos">
			<h4>Últimos produtos cadastrados:</h4>
			<table>
				<tr>
					<th>Nome</th>
					<th>Fabricante</th>
					<th>Valor da locação</th>
				</tr>
				<tr>
					<td>Serra Elétrica</td>
					<td>Makita</td>
					<td>35.00</td>
				</tr>
				<tr>
					<td>Lava a Jato</td>
					<td>Trapp</td>
					<td>28.00</td>
				</tr>
				<tr>
					<td>Martelo</td>
					<td>Bosch</td>
					<td>6.00</td>
				</tr>
			</table>
		</section>

	<!-- rodape -->
	<footer><p>Último acesso em: 17/09/2018</p>	</footer>
	<script src="../js/functionsAdm.js"></script>
</body>
</html>