<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de acesso aosistema</title>
</head>
<body>
<h1>Acesso ao sistema</h1>
<form method="POST">
E-mail <input type="text" name="preco"       value="<?php echo isset($produto) ? $produto->preco : null ?>"><br>
Senha <input type="text" name="estoquemax"   value="<?php echo isset($produto) ? $produto->estoquemax : null ?>"><br>
<input type="hidden"     name="idproduto"   value="<?php echo isset($produto) ? $produto->idproduto : null ?>">
<input type="submit">
</form>
<hr>
<h1>Não possui cadastro, faça o cadastro aqui: </h1>
<a href="cadastrosis.php">Link</a>
<hr>
<a href="index.html">Home</a>
</body>
</html>