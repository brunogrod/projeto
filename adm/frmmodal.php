<?php 

$idmodalidade = isset($_GET["idmodalidade"]) ? $_GET["idmodalidade"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
       $servidor = "localhost";
       $usuario = "root";
       $senha = "";
       $bd = "bdacadlutas";
       $con2 = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 
              
  
        if($op=="del"){
            $sql = "delete  FROM  tblmodalidades where idmodalidade= :idmodalidade";
            $stmt = $con2->prepare($sql);
            $stmt->bindValue(":idmodalidade",$idmodalidade);
            $stmt->execute();
            header("Location:listarmodalidades.php");
        }


        if($idmodalidade){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblmodalidades where idmodalidade= :idmodalidade";
            $stmt = $con2->prepare($sql);
            $stmt->bindValue(":idmodalidade",$idmodalidade);
            $stmt->execute();
            $modal = $stmt->fetch(PDO::FETCH_OBJ);
            
        }
        if($_POST){
            if($_POST["idmodalidade"]){
                $sql = "UPDATE tblmodalidades SET modal=:modal, preco=:preco, idProfessor=:idProfessor, diasSemana=:diasSemana WHERE idmodalidade =:idmodalidade";
                $stmt = $con2->prepare($sql);
                $stmt->bindValue(":modal", $_POST["modal"]);
                $stmt->bindValue(":preco", $_POST["preco"]);
                $stmt->bindValue(":idProfessor", $_POST["idProfessor"]);
                $stmt->bindValue(":diasSemana", $_POST["diasSemana"]);
                $stmt->bindValue(":idmodalidade", $_POST["idmodalidade"]);
                $stmt->execute(); 
                 
            } else {
                $sql = "INSERT INTO tblmodalidades (modal,preco,idProfessor,diasSemana) VALUES (:modal,:preco,:idProfessor,:diasSemana)";
                $stmt = $con2->prepare($sql);
                $stmt->bindValue(":modal", $_POST["modal"]);
                $stmt->bindValue(":preco", $_POST["preco"]);
                $stmt->bindValue(":idProfessor", $_POST["idProfessor"]);
                $stmt->bindValue(":diasSemana", $_POST["diasSemana"]);
                $stmt->execute(); 
            }
            header("Location:listarmodalidades.php");
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

<h2>Cadastro de Modalidades</h2>
<form method="POST">
<div class="row g-3">
  <div class="col">
Modalidade <input type="text" name="modal"        value="<?php echo isset($modal) ? $modal->modal : null ?>"><br>
</div>
<div class="col-12">
Valor <input type="text" name="preco"         value="<?php echo isset($modal) ? $modal->preco : null ?>"><br>
</div>
<div class="col-12">
ID Professor <input type="text" name="idProfessor"      value="<?php echo isset($modal) ? $modal->idProfessor : null ?>"><br>
</div>
<div class="col-12">
Dias na Semana  <input type="text" name="diasSemana"          value="<?php echo isset($modal) ? $modal->diasSemana : null ?>"><br>
</div>
<hr>
<input type="hidden"     name="idmodalidade"               value="<?php echo isset($modal) ? $modal->idprofessor : null ?>">
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
