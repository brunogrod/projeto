<?php


session_start();

include('../conexao/conexao.php');

echo "Olá - ".$_SESSION['usuarioNome'];  

echo "<a href='../index.html'>     |     Sair</a>";

?>

<?php
include('../conexao.php');

try{
    $sql = "SELECT * from tblprofessores";
    $qry = $con->query($sql);
    $professores = $qry->fetchAll(PDO::FETCH_OBJ);
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
<!-- Inicio Menu de Navegação -->
<ul class="nav justify-content-center">
  
  <li class="nav-item">
    <a class="nav-link" href="listarprofessores.php">Professores</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Modalidades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Calendário</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Alunos</a>
  </li>
 </ul>  
<!-- Término Menu de Navegação -->
<h1>Lista de Professores</h1>
<hr>
<a href="frmprofessor.php" <button type="button" class="btn btn-primary btn-lg">Novo Cadastro</button></a>  
<!--<a href="../index.html" <button type="button" class="btn btn-primary btn-lg">Home</button></a> -->

<!-- Listar professores -->
<hr>
<table border=1 class="table table-striped table table-hover">
    <thead>
        <tr>
           <th>id Professor</th> 
           <th>Foto Professor</th>
           <th>Professor</th>
           <th>Id Modalidade</th>
           <th>Disponibilidade</th>
           <th>Personal</th>
           <th>Hora das aulas</th>
           <th>Telefone de Contato</th>
           <th colspan=2>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($professores as $professor) { ?>
        <tr>
            <td><?php echo $professor->idprofessor ?></td>
            <td><?php echo $professor->fotoProf ?></td>
            <td><?php echo $professor->nomeProf ?></td>
            <td><?php echo $professor->idmodalidade ?></td>
            <td><?php echo $professor->dispon ?></td>
            <td><?php echo $professor->personal ?></td>
            <td><?php echo $professor->horaaula ?></td>
            <td><?php echo $professor->telefoneProf ?></td>
            <td><a href="frmprofessor.php?idprofessor=<?php echo $professor->idprofessor ?>"<button type="button" class="btn btn-secondary">Editar</button></a></td>
            <td><a href="frmprofessor.php?op=del&idprofessor=<?php echo  $professor->idprofessor ?>"<button type="button" class="btn btn-outline-danger">Excluir</button></a></td>

        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<!-- Término Listar professores -->
</body>
</html>
