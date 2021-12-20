<?php
include('../conexao.php');

try{
    $sql = "SELECT * from tblalunos";
    $qry = $con->query($sql);
    $alunos = $qry->fetchAll(PDO::FETCH_OBJ);
    //echo "<pre>";
    //print_r($clientes);
    //die();
} catch(PDOException $e){
    echo $e->getMessage();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Sistema de Lutas</title>
</head>
<body>
<div class="container">   
<h1>Lista de Alunos</h1>
<hr>
<a href="frmalunos.php" <button type="button" class="btn btn-primary btn-lg">Novo Cadastro</button></a> 
<a href="administrativo.php" <button type="button" class="btn btn-primary btn-lg">Voltar</button></a>
<hr>
<table border=1 class="table table-striped table table-hover">
    <thead>
        <tr>
           <th>id Aluno</th> 
           <th>Foto</th>
           <th>Nome Aluno</th>
           <th>Modalidade</th>
           <th>Telefone</th>
           <th>E-mail</th>
           <th>Atestado</th>
           <th>Pagamento</th>
           <th colspan=2>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alunos as $aluno) { ?>
        <tr>
            <td><?php echo $aluno->idAluno ?></td>
            <td><?php echo $aluno->fotoAluno ?></td>
            <td><?php echo $aluno->nomeAluno ?></td>
            <td><?php echo $aluno->idmodalidade ?></td>
            <td><?php echo $aluno->telefoneAluno ?></td>
            <td><?php echo $aluno->emailAluno ?></td>
            <td><?php echo $aluno->atestadoAluno ?></td>
            <td><?php echo $aluno->pgAluno ?></td>
            <td><a href="frmalunos.php?idAluno=<?php echo $aluno->idAluno ?>"<button type="button" class="btn btn-secondary">Editar</button></a></td>
            <td><a href="frmalunos.php?op=del&idAluno=<?php echo  $aluno->idAluno ?>"<button type="button" class="btn btn-outline-danger">Excluir</button></a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</body>
</html>