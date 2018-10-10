<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">	
		<title>Exemplo</title>

		<style>
			.opiniao{
				background-color: #eee;
			}
			
			.estrelas{
				color: orange;
				font-size: 1.5e;
			}
		</style>

	</head>
	
	<body>
		<?php
		$produto = "Fone de Ouvido";
		
		$opinioes = array(
			array("nome" => "João", "opiniao" => "Gostei muito!", "nota" => 5),
			array("nome" => "João", "opiniao" => "Gostei muito!", "nota" => 5),
			array("nome" => "João", "opiniao" => "Gostei muito!", "nota" => 5),			
			array("nome" => "João", "opiniao" => "Gostei muito!", "nota" => 5),			
		);
		?>
		
		echo "<h1>$produto</h1>";
		
		foreach ($opinioes as $item){
				echo "
					<div class='opiniao'>
						<p><strong>$item['nome']</strong></p>
						<p>$item['opiniao']</p>
						<p class='estrelas'>";
				for($i = 0; $i <= $item['nota']; $i++){
					echo "&circledast;";
				}
				echo "</p></div>;
		}
		
	</body>
</html>
