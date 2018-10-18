<!doctype html>
<html lang="pt-br">
  <head>
  	<meta charset="utf-8">
  	<title>Meu site</title>
  </head>
  <body>
  	<h2>Acesso</h2>
  	<br><br>
  	<form action="verificacao.php" method="post">
  		Login: <input type="text" name="login"><br>
  		Senha: <input type="password" name="senha"><br>
      <div style="color: red">
        <?php
        if(isset($_GET['erro'])){
          if($_GET['erro'] == 1)
            echo "Login incorreto";
          elseif($_GET['erro'] == 2)
            echo "Senha incorreta";
        }
        ?>
      </div>
  		<input type="submit" value="Entrar">
  	</form>
  </body>
</html>