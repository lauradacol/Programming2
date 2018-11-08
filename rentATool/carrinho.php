<?php
include "includes/layout/cabecalho.php";
?>
	<!-- area central com 3 colunas -->
	<div class="container">
		
		<?php
			include "includes/layout/menuLateral.php";
			include "includes/conexao.php";
			include "includes/functions.php";			
		?>		
		
		<section class="col-2">
		
		
		<?php
		
		if(!isset($_SESSION['carrinho'])){
			echo "<h2>Seu carrinho está vazio.</h2>";
		}
		else{
		?>
			<h2>Meu carrinho</h2>
			<div class="itemCarrinho">
				<span class="produtoCarrinho"><strong>Produto</strong></span>
				<span class="qtdeCarrinho"><strong>Quantidade</strong></span>
				<span class="precoCarrinho"><strong>Valor</strong></span>
			</div>
			<?php
				$total = 0;
				foreach($_SESSION['carrinho'] as $id => $item){
				?>
				<div class="itemCarrinho">
					<span class="produtoCarrinho"><strong><?=$item['nome'];?></strong></span>
					<input type="number" id="quantidade" name="quantidade" value=<?=$item['quantidade'];?> onchange=atualizaQuantidade(<?=$item['quantidade'];?>)>
				
					<!-- <span class="qtdeCarrinho"><strong><?=$item['quantidade'];?></strong></span> -->
					<span class="precoCarrinho" id="precoItem"><strong><?=formataPreco($item['valorFinal']);?></strong></span>
					<span class="excluirCarrinho"><a href="excluirCarrinho.php?id=<?=$id;?>" title="excluir item">X</a></span>
				</div>
				<?php
					$total += ($item['quantidade'] * $item['valorFinal']);					
				}
				?>
				<div class="itemCarrinho total">
					<span>Total:</span>
					<span class="precoCarrinho" id="precoCarrinho"><strong><?=formataPreco($total);?></strong></span>
				</div>
				
				<div class="botoes">
					<a href="index.php"><button>Continuar comprando</button></a>
					<a href="fecharPedido.php"><button>Finalizar pedido</button></a>					
				</div>
		<?php
		}		
		?>
		
		
		
		</section>
	
	<?php
	include "includes/layout/maisPedidos.php";
	?>	
	<!-- fim area central -->

<?php
include "includes/layout/rodape.php";
?>	

