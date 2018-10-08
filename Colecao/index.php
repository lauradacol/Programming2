<?php
include "includes/conexao.php";
if(isset($_POST['inserir'])){
	//botao cadastrar foi acionado, podemos inserir os dados
	$nome_fam = $_POST['nome_fam'];
	$nome_gen = $_POST['nome_gen'];
	$nome_sp = $_POST['nome_sp'];
	$localidade = $_POST['localidade'];
	$coordenada = $_POST['coordenada'];
	$coletor = $_POST['coletor'];
	$data = $_POST['data'];
	$vidro = $_POST['vidro'];
	$obs = $_POST['obs'];					
				
	$sql = "INSERT INTO individuo (id_sp, id_local, data_col, coletor, coordenadas, obs, vidro) VALUES ($nome_sp, $localidade, $data, $coletor, $coordenadas, $obs, $vidro)";	
	$resultado = mysqli_query($conexao, $sql);
	
	if($resultado){
		$mensagem = "Indivíduo tombado com sucesso!";
	}
	else{
		$mensagem = "Erro. O indivíduo não pode ser tombado!";
		$mensagem .= mysqli_error($conexao); //para debug
	}		
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="description" content="Gerenciamento da CHUFSC">
	<meta name="keywords" content="Coleção biológica, museu">	
	<link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/colecao.css">

	<title>CHUFSC</title>
</head>
<body>
	<!-- cabeçalho -->
	<header>
		<h1 id="inicio">CHUFSC - Coleção Herpetológica da UFSC</h1>
		<h2>Gerenciamento da Coleção</h2>
		<p class="logout"><a href="#"><img src="imagens/logout.png" width="32" alt="ícone de logout"><br>Logout</a></p>

		<!-- Menu-->
		<nav class="menu">    
			<ul>
				<li><a href="#familia">Inserir Família</a></li>
				<li><a href="#genero">Inserir Gênero</a></li>
				<li><a href="#especie">Inserir Espécie</a></li>				
				<li><a href="#localidade">Inserir Localidade</a></li>
				<li><a href="#coordenadas">Inserir Coordenada</a></li>	
				<li><a href="#coletor">Inserir Coletor</a></li>									
				<li><a href="#tecido">Inserir Tecido</a></li>	
				<li><a href="#individuo">Inserir Individuo</a></li>							
				<li><a href="#tombo">Consultar Livro Tombo</a></li>
			</ul>
		</nav>
				
	</header>
	
	<main>
		<!--INSERIR INDIVÍDUO-->
		<form action="" method="post" id="form-individuo">
			<section id="individuo">
				<fieldset>
					<legend>Inserir Indivíduo</legend>		
					
					
					<?php
						$sql = "select max(tombo) as tombo from individuo";
						$resultado = mysqli_query($conexao,$sql);
						$numerotombo = mysqli_fetch_array($resultado);
					?>
					
					<p id="numerotombo"><?=intval($numerotombo['tombo'])+1?></p>				
										
					<div>
						<label for="nome_fam" class="form-alinhado">Família:</label>
							<select name="nome_fam" id="nome_fam">
								<?php										
									$sql = "SELECT * FROM familia ORDER BY nome_fam";
									$resultado = mysqli_query($conexao,$sql);
									while ($familia = mysqli_fetch_array($resultado)){
										echo "<option value ='{$familia['id_fam']}'>{$familia['nome_fam']}</option>";											
									}
								?>				
							</select>
				
					</div>	

					<div>
						<label for="nome_gen" class="form-alinhado">Gênero:</label>
							<select name="nome_gen" id="nome_gen">
								<?php										
									$sql = "SELECT * FROM genero ORDER BY nome_gen";
									$resultado = mysqli_query($conexao,$sql);
									while ($genero = mysqli_fetch_array($resultado)){
										echo "<option value ='{$genero['id_gen']}'>{$genero['nome_gen']}</option>";											
									}
								?>						
							</select>					
					</div>

					<div>
						<label for="nome_sp" class="form-alinhado">Espécie:</label>
							<select name="nome_sp" id="nome_sp">
								<?php								
									$sql = "SELECT * FROM especie ORDER BY nome_sp";
									$resultado = mysqli_query($conexao,$sql);
									while ($especie = mysqli_fetch_array($resultado)){
										echo "<option value ='{$especie['id_sp']}'>{$especie['nome_sp']}</option>";											
									}
								?>					
							</select>					
					</div>	
					
					<div>
						<label for="localidade" class="form-alinhado">Localidade:</label>
							<select name="localidade" id="localidade">
								<?php								
									$sql = "SELECT * FROM localidade ORDER BY localidade";
									$resultado = mysqli_query($conexao,$sql);
									while ($localidade = mysqli_fetch_array($resultado)){
										echo "<option value ='{$localidade['id_local']}'>{$localidade['localidade']}</option>";											
									}
								?>	
							</select>					
					</div>				
					
					<div>
						<label for="coordenada" class="form-alinhado">ID da Coordenada:</label>
							<select name="coordenada" id="coordenada">
								<?php								
									$sql = "SELECT * FROM coordenadas";
									$resultado = mysqli_query($conexao,$sql);
									while ($coordenadas = mysqli_fetch_array($resultado)){
										echo "<option value ='{$coordenadas['id_coo']}'>{$coordenadas['id_coo']}</option>";											
									}
								?>					
							</select>					
					</div>				

					<div>
						<label for="coletor" class="form-alinhado">Coletor:</label>
							<select name="coletor" id="coletor">
								<?php								
									$sql = "SELECT * FROM coletor order by nome_col";
									$resultado = mysqli_query($conexao,$sql);
									while ($coletor = mysqli_fetch_array($resultado)){
										echo "<option value ='{$coletor['email']}'>{$coletor['nome_col']}</option>";											
									}
								?>	
							</select>					
					</div>	
			
					<div>
						<label for="data" class="form-alinhado">Data de Coleta:</label> 
						<input id="data" type="date" name="data" required>			
					</div>	
			
					<div>
						<label for="vidro" class="form-alinhado">Vidro de Armazenamento: </label>
						<input type="text" name="vidro" id="vidro" maxlength="10" required>			
					</div>	
					
					<div>
						<label for="obs" class="form-alinhado">Observações: </label>
						<textarea name="obs" maxlength="50"></textarea>			
					</div>				
					
					<div>
						<input type="submit" id="botao" value="inserir" name="inserir">
						<input type="reset" value="Limpar">
					</div>			
				</fieldset>		
			</section>	
		</form>								
<!--INSERIR FAMILIA-->

		<!--
		<section id="familia">
			<fieldset>
				<legend>Inserir Família:</legend>
				<div>
					<label for="nomefam" class="form-alinhado">Nome da Família: </label>
					<input type="text" name="nomefam" id="nomefam" maxlength="50" required autofocus>			
				</div>	
				<div>
					<input type="submit" value="Inserir" onclick="isEmpty()">
					<input type="reset" value="Limpar">
				</div>				
			</fieldset>	
		</section>

		<section id="genero">
			<fieldset>
				<legend>Inserir Gênero:</legend>
				<div>
					<label for="nomefam" class="form-alinhado">Família:</label>
						<select name="nomefam">
							<option value="0">Colubridae</option>
							<option value="1">Viperidae</option>
							<option value="2">Elapidae</option>
							<option value="3">Boidae</option>					
						</select>					
				</div>
				
				<div>
					<label for="nomegen" class="form-alinhado">Nome do Gênero: </label>
					<input type="text" name="nomegen" id="nomegen" maxlength="50" required>			
				</div>	
				<div>
					<input type="submit" value="Inserir" onclick="isEmpty()">
					<input type="reset" value="Limpar">
				</div>				
			</fieldset>		
		</section>	
		
		<section id="especie">
			<fieldset>
				<legend>Inserir Espécie:</legend>
				<div>
					<label for="nomegen" class="form-alinhado">Gênero:</label>
						<select name="nomegen">
							<option value="0">Liophis</option>
							<option value="1">Bothrops</option>
							<option value="2">Micrurus</option>
							<option value="3">Boa</option>					
						</select>					
				</div>
				
				<div>
					<label for="nomeesp" class="form-alinhado">Epítoto específico: </label>
					<input type="text" name="nomeesp" id="nomeesp" maxlength="50" required>			
				</div>	
				<div>
					<input type="submit" value="Inserir" onclick="isEmpty()">
					<input type="reset" value="Limpar">
				</div>				
			</fieldset>		
		</section>		

		<section id="localidade">
			<fieldset>
				<legend>Inserir Localidade:</legend>			
				<div>
					<label for="municipio" class="form-alinhado">Município: </label>
					<input type="text" name="municipio" id="municipio" maxlength="100" required>			
				</div>

				<div>
					<label for="uf" class="form-alinhado">Unidade Federativa: </label>
					<input type="text" name="uf" id="uf" maxlength="2" required>			
				</div>
				
				<div>
					<label for="localidade2" class="form-alinhado">Localidade: </label>
					<input type="text" name="localidade2" id="localidade2" maxlength="200" required>			
				</div>
					
				<div>
					<input type="submit" value="Inserir" onclick="isEmpty()">
					<input type="reset" value="Limpar">
				</div>				
			</fieldset>		
		</section>	

		<section id="coordenadas">
			<fieldset>
				<legend>Inserir Coordenada:</legend>			
				<div>
					<label for="x" class="form-alinhado">Coordenada x: </label>
					<input type="text" name="x" id="x" maxlength="50" required>			
				</div>

				<div>
					<label for="y" class="form-alinhado">Coordenada y: </label>
					<input type="text" name="y" id="y" maxlength="50" required >			
				</div>
				
				<div>
					<label for="unidade" class="form-alinhado">Unidade:</label>
					<input type="text" name="unidade" id="unidade" maxlength="100" required>				
				</div>			
				
				<div>
					<label for="datum" class="form-alinhado">Datum:</label>
					<input type="text" name="datum" id="datum" maxlength="100" required>				
				</div>							
				
				<div>
					<input type="submit" value="Inserir" onclick="isEmpty()">
					<input type="reset" value="Limpar">
				</div>				
			</fieldset>		
		</section>	

		<section id="coletor">
			<fieldset>
				<legend>Inserir Coletor:</legend>			
				<div>
					<label for="nomecol" class="form-alinhado">Nome do Coletor: </label>
					<input type="text" name="nomecol" id="nomecol" maxlength="200" required>			
				</div>

				<div>
					<label for="email" class="form-alinhado">E-mail: </label>
					<input type="email" name="email" id="email" placeholder="exemplo@exemplo.com"  maxlength="200" required>				
				</div>
				
				<div>
					<label for="telefone" class="form-alinhado">Telefone: </label>
					<input type="text" name="telefone" id="telefone" placeholder="(xx)xxxxx-xxxx" maxlength="20">				
				</div>			
				
				<div>
					<input type="submit" value="Inserir" onclick="isEmpty()">
					<input type="reset" value="Limpar">
				</div>				
			</fieldset>		
		</section>		
		
		<section id="tecido">
			<fieldset>
				<legend>Inserir Tecido</legend>			
				<div>
					<label for="tombotec" class="form-alinhado">Número Tombo:</label>
						<select name="nomegen">
							<option value="0">001</option>
							<option value="1">002</option>
							<option value="2">003</option>
							<option value="3">004</option>					
						</select>					
				</div>
				
				<div>
					<label for="localtec" class="form-alinhado">Localização: </label>
					<input type="text" name="localtec" id="localtec" maxlength="30" required>			
				</div>			
				
				<div>
					<label for="tipotec" class="form-alinhado">Tipo de Tecido: </label>
					<input type="text" name="tipotec" id="tipotec" maxlength="100" required>			
				</div>	
				
				<div>
					<input type="submit" value="Inserir" onclick="isEmpty()">
					<input type="reset" value="Limpar">
				</div>										
			</fieldset>		
		</section>		
		-->
	</main>

	<fieldset id="tombo">

		<legend>Livro Tombo:</legend>
		<div id="tabelatombo">
			<table id="tabelatombo2">
				<tr>
					<th>Nº Tombo</th>
					<th>Família</th>
					<th>Gênero</th>
					<th>Espécie</th>
					<th>Localidade</th>
					<th>Coordenadas</th>
					<th>Coletor</th>
					<th>Tecido</th>				
				</tr>

				<?php										
				$sql = "select nome_fam, nome_gen, nome_sp, individuo.tombo, data_col, obs, vidro, nome_col, x, y, id_tec, localidade from ((((((familia left join genero on familia.id_fam = genero.id_fam) right join especie on genero.id_gen = especie.id_gen) right join individuo on especie.id_sp = individuo.id_sp) left join coletor on coletor.email = individuo.coletor) left join coordenadas on individuo.coordenadas = coordenadas.id_coo) left join tecido on individuo.tombo = tecido.tombo) left join localidade on localidade.id_local = individuo.id_local;";
				$resultado = mysqli_query($conexao,$sql);
				while ($linha = mysqli_fetch_array($resultado)){
				?>	
					
				
				<tr>
					<td id = "rTombo"><?=$linha['tombo'];?></td>
					<td id = "rFamilia"><?=$linha['nome_fam'];?></td>
					<td id = "rGenero"><?=$linha['nome_gen'];?></td>																												
					<td id = "rEspecie"><?=$linha['nome_sp'];?></td>
					<td id = "rLocalidade"><?=$linha['localidade'];?></td>
					<td id = "rCoordenada"><?=$linha['x'].",".$linha['y'];?></td>					
					<td id = "rColetor"><?=$linha['nome_col'];?></td>

					<?php
					if($linha['id_tec']==NULL){
						$tecido = "NÃO";
					}					
					else{
						$tecido = "SIM";
					}
					?>					
					<td id = "rTecido"><?=$tecido;?></td>
				</tr>											
			<?php	
				}
			?>		
			
			
				
					
			</table>		
		</div>
												
	</fieldset>	
		
	<footer>
		<a href="#inicio">Início da Página</a>		
	</footer>
	
	<script src="js/colecao.js"></script>

</body>
</html>
