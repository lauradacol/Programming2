<?php
session_start(); // se existe uma sessao ativa, vincula-se a ela; senao, cria uma nova
if(!isset($_SESSION['login']) | !isset($_SESSION['inicio'])){
  echo "<p>Este conteúdo é restrito a usuários logados.</p>";
  echo "<p><a href='login.php'>Ir para a página de login</a></p>";
  die(); // interrompe o carregamento do restante da página
}
?>
