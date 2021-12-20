<?php
include('../conexao.php');

try{
    $sql = "SELECT * from tblmodalidades";
    $qry = $con->query($sql);
    $modalidades = $qry->fetchAll(PDO::FETCH_OBJ);
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
<h1>Lista de Modalidades</h1>
<hr>
<a href="frmmodal.php" <button type="button" class="btn btn-primary btn-lg">Novo Cadastro</button></a> 
<a href="administrativo.php" <button type="button" class="btn btn-primary btn-lg">Voltar</button></a>
<hr>
<table border=1 class="table table-striped table table-hover">
    <thead>
        <tr>
           <th>id Modalidade</th> 
           <th>Modalidade</th>
           <th>Preço</th>
           <th>ID Professor</th>
           <th>Dias da Semana</th>
           <th colspan=2>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($modalidades as $modal) { ?>
        <tr>
            <td><?php echo $modal->idmodalidade ?></td>
            <td><?php echo $modal->modal ?></td>
            <td><?php echo $modal->preco ?></td>
            <td><?php echo $modal->idProfessor ?></td>
            <td><?php echo $modal->diasSemana ?></td>
            <td><a href="frmmodal.php?idmodalidade=<?php echo $modal->idmodalidade ?>"<button type="button" class="btn btn-secondary">Editar</button></a></td>
            <td><a href="frmmodal.php?op=del&idmodalidade=<?php echo  $modal->idmodalidade ?>"<button type="button" class="btn btn-outline-danger">Excluir</button></a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</body>
</html>