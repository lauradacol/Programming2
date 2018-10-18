<?php
session_start(); // se existe uma sessao ativa, vincula-se a ela; senao, cria uma nova
if(!isset($_SESSION['login']) | !isset($_SESSION['inicio'])){
  echo "<p>Este conteúdo é restrito a usuários logados.</p>";
  echo "<p><a href='login.php'>Ir para a página de login</a></p>";
  die(); // interrompe o carregamento do restante da página
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
  	<meta charset="utf-8">
  	<title>Meu site</title>
  </head>
  <body>
  	<h2>Página de acesso exclusivo para usuários autenticados.</h2>
  	<br><br>
  	<p>Você está logado como <b><?=$_SESSION['login'];?></b></p>
  	<p>Seu acesso iniciou às <b><?=$_SESSION['inicio'];?></b></p>
  	<p><a href="sair.php">Sair</a></p>
  </body>
</html>