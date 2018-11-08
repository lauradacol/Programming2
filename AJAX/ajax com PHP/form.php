<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clientes</title>    
    <script src="ajax.js"></script>
</head>
<body>
  <h1>Cadastro de Clientes</h1>
<form method="post">
  <label>Nome:
  <input type="text" name="nome"></label><br><br>
  <label>Estado:
    <select name="uf" id="uf" onchange="loadCities()">
      <option value="">Selecione</option>
      <option value="PR">Paraná</option>
      <option value="SC">Santa Catarina</option>
      <option value="RS">Rio Grande do Sul</option>
    </select>
  </label><br><br>
  <label>Cidade:
    <select name="cidade" id="cidade" disabled="disabled">
      <option value="">--- Selecione o estado ---</option>
    </select>
  </label><br><br>  
  <input type="submit" value="Cadastrar" name="cadastrar"> 
</form>
</body>
</html>
