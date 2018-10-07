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
				$sql = "SELECT nome, imagem, valor, desconto FROM produto WHERE ID LIKE '$id'";
												
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
			<h2><?=$titulo?></h2>
			
			<?php				
				if(mysqli_num_rows($resultado) == 0){
					echo "<p>Produto Inexistente</p>";
				}
				else{				
			?>
			<div class="produto-unico">
				<img src="img/produtos/<?=mostraImagem($produto['imagem']);?>" alt="<?=$produto['nome'];?>">
				<p class="nome_produto"><?=$produto['nome'];?></p>
				<p class="valor"><?=$produto['valor'];?></p>
				<p class="desconto"><?=$produto['desconto'];?></p>					
									
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
