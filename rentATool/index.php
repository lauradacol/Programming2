<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Rent a Tool</title>
	<link rel="stylesheet" type="text/css" href="css/rent.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> <!-- web font Lobster -->
</head>
<body>
	<!-- cabeçalho -->
	<header>
		<h1>Rent a Tool</h1>
		<p class="carrinho"><a href="#">Meu carrinho <img src="img/cart.png" width="32"></a></p>
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

	<!-- area central com 3 colunas -->
	<div class="container">
		
		<section class="col-1">
			<section class="busca">
				<form>
					<input type="search" placeholder="Busca..." name="busca">
					<button>OK</button>
				</form>
			</section>

			<section class="menu-categorias">
				<h2>Categorias</h2>
				<nav>
					<ul>
						<?php
						include "includes/categorias.php";
						
						foreach ($CATEGORIAS as $indice => $nomeCategoria){
							echo "<li><a href='index.php?secao=$indice'>$nomeCategoria</a></li>";
						}
						?>
				</nav>
			</section>
		</section>

		<section class="col-2">
			<?php
			if(isset($_GET['secao'])){
				$categoriaSelecionada = $_GET['secao'];
				$titulo = $CATEGORIAS[$categoriaSelecionada];
			}
			
			elseif(isset($_GET['busca'])){
				$titulo= "Resultado da busca por \"<strong>{$_GET['busca']}</strong>\" ";
			}
			
			else{
				$titulo = "Novidades";
			}			
			?>
			<h2><?=$titulo?></h2>
			<!-- container de produtos -->
			<div class="lista-produtos">
				<!-- um produto -->
				<?php
				include "includes/conexao.php";
				include "includes/functions.php";
				$sql = "select id, nome, imagem, valor, desconto from produto";
				
				if(isset($categoriaSelecionada))
					$sql.=" where $categoriaSelecionada IS TRUE";
				
				elseif(isset($_GET['busca']))
					$sql.=" where nome like '%{$_GET['busca']}%'";				
				
				else
					$sql.=" order by id desc limit 10"; // novidades
								
				//echo $sql;				
								
				$resultado = mysqli_query($conexao, $sql);
				
				if(mysqli_num_rows($resultado) == 0){
					echo "<p>Nenhum produto encontrado</p>";
				}
				else{
					while ($produto = mysqli_fetch_array($resultado)){
				?>
						<div class="produto">
						  <a href="produto.html">
							<figure>
								<img src="img/produtos/<?=mostraImagem($produto['imagem']);?>" alt="<?=$produto['nome'];?>">
								<figcaption><?=$produto['nome'];?><span class="preco">
									<?=mostraPreco($produto['valor'],$produto['desconto']);?></span></figcaption>
							</figure>
						</a>
						</div> 
				    <?php						
					}
				}
				?>
				
			</div>			
		</section>

		<aside class="col-3">
			<h2>Mais pedidos</h2>
			<!-- container de mais pedidos -->
			<div class="lista-produtos">
				<!-- um produto -->
				<div class="produto">
					<a href="produto.html">
						<figure>
							<img src="img/produtos/serra.jpg" alt="miniatura1">
							<figcaption>Serra elétrica<span class="preco">R$ 20,00</span></figcaption>
						</figure>
					</a>
				</div>  
				<!-- fim produto -->
				
				<!-- adicione mais produtos --> 				
			</div>
		</aside>
	</div>
	<!-- fim area central -->

	<!-- rodape -->
	<footer><p>Rent a Tool - Chapecó/SC</p>
		<ul class="social">
			<li><a href="http://facebook.com/rentatool"><img src="img/facebook.png" alt="Facebook"></a></li>
			<li><a href="http://twitter.com/rentatool"><img src="img/twitter.png" alt="Twitter"></a></li>
			<li><a href="http://plus.google.com/rentatool"><img src="img/googleplus.png" alt="Google+"></a></li>
		</ul>
		<div id="ajuda">Precisa de ajuda? <span id="fechar">x</span></div>
	</footer>
	<!-- fim rodape -->
	<script src="js/functions.js"></script>
</body>
</html>
