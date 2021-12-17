<?php 

$idprofessor = isset($_GET["idprofessor"]) ? $_GET["idprofessor"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
       $servidor = "localhost";
       $usuario = "root";
       $senha = "";
       $bd = "bdacadlutas";
       $con2 = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 
              
  
        if($op=="del"){
            $sql = "delete  FROM  tblprofessores where idprofessor= :idprofessor";
            $stmt = $con2->prepare($sql);
            $stmt->bindValue(":idprofessor",$idprofessor);
            $stmt->execute();
            header("Location:listarprofessores.php");
        }


        if($idprofessor){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblprofessores where idprofessor= :idprofessor";
            $stmt = $con2->prepare($sql);
            $stmt->bindValue(":idprofessor",$idprofessor);
            $stmt->execute();
            $professor = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($idprofessor);
        }
        if($_POST){
            if($_POST["idprofessor"]){
                $sql = "UPDATE tblprofessores SET fotoProf=:fotoProf, nomeProf=:nomeProf, idmodalidade=:idmodalidade, dispon=:dispon, personal=:personal, horaaula=:horaaula, telefoneProf=:telefoneProf WHERE idprofessor =:idprofessor";
                $stmt = $con2->prepare($sql);
                $stmt->bindValue(":fotoProf", $_POST["fotoProf"]);
                $stmt->bindValue(":nomeProf", $_POST["nomeProf"]);
                $stmt->bindValue(":idmodalidade", $_POST["idmodalidade"]);
                $stmt->bindValue(":dispon", $_POST["dispon"]);
                $stmt->bindValue(":personal", $_POST["personal"]);
                $stmt->bindValue(":horaula", $_POST["horaula"]);
                $stmt->bindValue(":telefoneProf", $_POST["telefoneProf"]);
                $stmt->bindValue(":idprofessor", $_POST["idprofessor"]);
                $stmt->execute(); 
                 
            } else {
                $sql = "INSERT INTO tblprofessores (fotoProf,nomeProf,idmodalidade,dispon,personal,horaula,telefoneProf) VALUES (:fotoProf,:nomeProf,:idmodalidade,:dispon,:personal,:horaula,:telefoneProf)";
                $stmt = $con2->prepare($sql);
                $stmt->bindValue(":fotoProf", $_POST["fotoProf"]);
                $stmt->bindValue(":nomeProf", $_POST["nomeProf"]);
                $stmt->bindValue(":idmodalidade", $_POST["idmodalidade"]);
                $stmt->bindValue(":dispon", $_POST["dispon"]);
                $stmt->bindValue(":personal", $_POST["personal"]);
                $stmt->bindValue(":horaula", $_POST["horaula"]);
                $stmt->bindValue(":telefoneProf", $_POST["telefoneProf"]);
                $stmt->execute(); 
            }
            header("Location:listarprofessores.php");
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
    <title>Adicionar Professores</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">

<h1>Cadastro de Professores</h1>
<form method="POST">
<div class="row g-3">
  <div class="col">
Foto Professor  <input type="text" name="fotoProf"        value="<?php echo isset($professor) ? $professor->fotoProf : null ?>"><br>
</div>
<div class="col-12">
Nome Professor <input type="text" name="nomeProf"         value="<?php echo isset($professor) ? $professor->nomeProf : null ?>"><br>
</div>
<div class="col-12">
ID Modalidade <input type="text" name="idmodalidade"      value="<?php echo isset($professor) ? $professor->idmodalidade : null ?>"><br>
</div>
<div class="col-12">
disponibilidade <input type="text" name="dispon"          value="<?php echo isset($professor) ? $professor->dispon : null ?>"><br>
</div>
<div class="col-12">
Personal <input type="text" name="personal"               value="<?php echo isset($professor) ? $professor->personal : null ?>"><br>
</div>
<div class="col-12">
Horário das aulas <input type="date" name="horaula"       value="<?php echo isset($professor) ? $professor->horaula : null ?>"><br>
</div>
<div class="col-12">
Telefone <input type="text" name="telefoneProf"           value="<?php echo isset($professor) ? $professor->telefoneProf : null ?>"><br>
</div>
<hr>
<input type="hidden"     name="idprofessor"               value="<?php echo isset($professor) ? $professor->idprofessor : null ?>">
<br>
<div class="col-12">
    <input type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
  </div>
</form>
</div>
<br>
<a href="administrativo.php" class="btn btn-light btn-sm ">voltar</a>
   

</body>
</html>
