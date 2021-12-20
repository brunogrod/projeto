<?php 

$idAluno = isset($_GET["idAluno"]) ? $_GET["idAluno"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
       $servidor = "localhost";
       $usuario = "root";
       $senha = "";
       $bd = "bdacadlutas";
       $con2 = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 
              
  
        if($op=="del"){
            $sql = "delete  FROM  tblalunos where idAluno= :idAluno";
            $stmt = $con2->prepare($sql);
            $stmt->bindValue(":idAluno",$idAluno);
            $stmt->execute();
            header("Location:listaralunos.php");
        }


        if($idAluno){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblalunos where idAluno= :idAluno";
            $stmt = $con2->prepare($sql);
            $stmt->bindValue(":idAluno",$idAluno);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_OBJ);
            
        }
        if($_POST){
            if($_POST["idAluno"]){
                $sql = "UPDATE tblalunos SET fotoAluno=:fotoAluno, nomeAluno=:nomeAluno, idmodalidade=:idmodalidade, telefoneAluno=:telefoneAluno, emailAluno=:emailAluno, atestadoAluno=:atestadoAluno, pgAluno=:pgAluno   WHERE idAluno =:idAluno";
                $stmt = $con2->prepare($sql);
                $stmt = $con2->prepare($sql);
                $stmt->bindValue(":fotoAluno", $_POST["fotoAluno"]);
                $stmt->bindValue(":nomeAluno", $_POST["nomeAluno"]);
                $stmt->bindValue(":idmodalidade", $_POST["idmodalidade"]);
                $stmt->bindValue(":telefoneAluno", $_POST["telefoneAluno"]);
                $stmt->bindValue(":emailAluno", $_POST["emailAluno"]);
                $stmt->bindValue(":atestadoAluno", $_POST["atestadoAluno"]);
                $stmt->bindValue(":pgAluno", $_POST["pgAluno"]);
                $stmt->bindValue(":idAluno", $_POST["idAluno"]);
                $stmt->execute(); 
                 
            } else {
                $sql = "INSERT INTO tblalunos (fotoAluno,nomeAluno,idmodalidade,telefoneAluno,emailAluno,atestadoAluno,pgAluno) VALUES (:fotoAluno,:nomeAluno,:idmodalidade,:telefoneAluno,:emailAluno,:atestadoAluno,:pgAluno)";
                $stmt = $con2->prepare($sql);
                $stmt->bindValue(":fotoAluno", $_POST["fotoAluno"]);
                $stmt->bindValue(":nomeAluno", $_POST["nomeAluno"]);
                $stmt->bindValue(":idmodalidade", $_POST["idmodalidade"]);
                $stmt->bindValue(":telefoneAluno", $_POST["telefoneAluno"]);
                $stmt->bindValue(":emailAluno", $_POST["emailAluno"]);
                $stmt->bindValue(":atestadoAluno", $_POST["atestadoAluno"]);
                $stmt->bindValue(":pgAluno", $_POST["pgAluno"]);
                $stmt->execute(); 
            }
            header("Location:listaralunos.php");
        } 
    } catch(PDOException $e){
         echo "erro";
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Modalidades</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">

<h2>Cadastro de Alunos</h2>
<form method="POST">
<div class="row g-3">
  <div class="col">
Foto <input type="text" name="fotoAluno"        value="<?php echo isset($aluno) ? $aluno->fotoAluno : null ?>"><br>
</div>
<div class="col-12">
Nome Aluno <input type="text" name="nomeAluno"         value="<?php echo isset($aluno) ? $aluno->nomeAluno : null ?>"><br>
</div>
<div class="col-12">
ID Modalidade <input type="text" name="idmodalidade"      value="<?php echo isset($aluno) ? $aluno->idmodalidade : null ?>"><br>
</div>
<div class="col-12">
Telefone Aluno  <input type="text" name="telefoneAluno"          value="<?php echo isset($aluno) ? $aluno->telefoneAluno : null ?>"><br>
</div>
<div class="col-12">
Email Aluno  <input type="mail" name="emailAluno"          value="<?php echo isset($aluno) ? $aluno->emailAluno : null ?>"><br>
</div>
<div class="col-12">
atestado Aluno  <input type="text" name="atestadoAluno"          value="<?php echo isset($aluno) ? $aluno->atestadoAluno : null ?>"><br>
</div>
<div class="col-12">
Pagamento Aluno  <input type="text" name="pgAluno"          value="<?php echo isset($aluno) ? $aluno->pgAluno : null ?>"><br>
</div>
<hr>
<input type="hidden"     name="idAluno"               value="<?php echo isset($aluno) ? $aluno->idAluno : null ?>">
<br>
<div class="col-12">
    <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
  </div>
</form>
</div>
<br>
<a href="administrativo.php" class="btn btn-light btn-sm ">voltar</a>
   

</body>
</html>
