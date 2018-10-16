<?php
include "includes/layout/cabecalho.php";
?>
	<!-- area central com 3 colunas -->
	<div class="container">
		
		<?php
			include "includes/layout/menuLateral.php";
		?>
		
		<?php
				include "includes/conexao.php";
				include "includes/functions.php";
				
				$id = $_GET['id'];								
				$sql = "select fabricante.nome as fabricante, produto.nome as nome, imagem, valor, desconto, tensao, descricao, catMarcenaria, catJardinagem, catLimpeza, catEscritorio, catMecanica, catOutros from produto left join fabricante on fabricante.id = produto.idFabricante where produto.id like '$id'";
												
				//echo $sql;				
								
				$resultado = mysqli_query($conexao, $sql);
				$produto = mysqli_fetch_array($resultado);
		?>		
		
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
				$titulo = $produto['nome'];
			}			
			?>
			
			<?php				
				if(mysqli_num_rows($resultado) == 0){
					echo "<p>Produto Inexistente</p>";
				}
				else{				
			?>
			<div class="produto-unico">
				<img src="img/produtos/<?=mostraImagem($produto['imagem']);?>" alt="<?=$produto['nome'];?>">
				
				<div class="legenda">
					<p class="nome"><?=$produto['nome'];?></p>

					<p><span class="preco">
									<?=mostraPreco($produto['valor'],$produto['desconto']);?></span></p>	
				
					<form action="adiciona.php" method="post" id="add-carrinho">
						<label for="quantidade">Quantidade:</label>
						<input type="number" id="quantidade" name="quantidade" value="1">
						
						<input type="submit" id="botao" value="Adicionar ao Carrinho" name="add">
					</form>
					
					<p class="detalhes">Detalhes do produto:</p>
					
					<?php
						if($produto['fabricante']==NULL){
							$fab = "Não Aplicável";
						}
						else{
							$fab = $produto['fabricante'];
						}
						
						if($produto['tensao']==0){
							$ten = "Não Aplicável";
						}
						else{
							$ten = $produto['tensao'];
						}
					?>
					<div class="detalhes2">
						<p class= "fab">Fabricante: <?=$fab?></p>
						<p class= "tensao">Tensão: <?=$ten?></p>					
						<p class= "desc">Descricao: <?=nl2br($produto['descricao']);?></p>				
					</div>
					
					<p class="detalhes">Categorias:</p>
					<?php
						$categorias = array();
						if($produto['catMarcenaria']==1){
							array_push($categorias, "Marcenaria");							
						}
						if($produto['catJardinagem']==1){
							array_push($categorias, "Jardinagem");							
						}
						if($produto['catLimpeza']==1){
							array_push($categorias, "Limpeza");							
						}
						if($produto['catEscritorio']==1){
							array_push($categorias, "Escritorio");							
						}
						if($produto['catMecanica']==1){
							array_push($categorias, "Mecanica");							
						}						
						if($produto['catOutros']==1){
							array_push($categorias, "Outros");							
						}
												
						echo "<ul>";
							foreach ($categorias as $lista){
								echo "<li style ='color: grey;'>$lista</li>";
							}
							echo "</ul>";
						
						
					?>
					
				</div>				
									
			<?php						
				}				
			?>				
			</div>			
		</section>
	
	<?php
	include "includes/layout/maisPedidos.php";
	?>	
	<!-- fim area central -->

<?php
include "includes/layout/rodape.php";
?>	
