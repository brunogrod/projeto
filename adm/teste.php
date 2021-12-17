<?php 

$idprofessor = isset($_GET["bdacadlutas"]) ? $_GET["bdacadlutas"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 

    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdacadlutas";
        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblprofessores where idprofessor= :idprofessor";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idprofessor",$idprofessor);
            $stmt->execute();
            header("Location:listarprofessores.php");
        }


        if($idprofessor){
            //estou buscando os dados do cliente no BD
            $sql = "SELECT * FROM  tblprofessores where idprofessor= :idprofessor";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idprofessor",$idprofessor);
            $stmt->execute();
            $professor = $stmt->fetch(PDO::FETCH_OBJ);
            //var_dump($idprofessor);
        }
        if($_POST){
            if($_POST["Idprofessor"]){
                $sql = "UPDATE tblprofessores SET fotoProf=:fotoProf, nomeProf=:nomeProf, IDmodalidade=:IDmodalidade, Dispon=:Dispon, Personal=:personal, horaaula=:horaaula, telefoneProf=:telefoneProf WHERE Idprofessor =:Idprofessor";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":fotoProf", $_POST["fotoProf"]);
                $stmt->bindValue(":horaula", $_POST["horaula"]);
                $stmt->bindValue(":Idprofessor", $_POST["Idprofessor"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO tblprofessores(fotoProf,nomeProf,IDmodalidade,Dispon,Personal,horaula,telefoneProf) VALUES (:fotoProf,:nomeProf,:IDmodalidade,:Dispon,:Personal,:horaula,:telefoneProf)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":fotoProf", $_POST["fotoProf"]);
                $stmt->bindValue(":horaula", $_POST["horaula"]);
                $stmt->bindValue(":Idprofessor", $_POST["Idprofessor"]);
                $stmt->execute(); 
            }
            header("Location:listarprofessores.php");
        } 
    } catch(PDOException $e){
         echo "erro".$e->getMessage;
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Produtos</title>
</head>
<body>
<h1>Cadastro de Produtos</h1>
<form method="POST">
Foto Professor  <input type="text" name="fotoProf"  value="<?php echo isset($professor) ? $professor->fotoProf : null ?>"><br>
Horário das aulas <input type="date" name="horaula"       value="<?php echo isset($professor) ? $professor->horaula : null ?>"><br>
<input type="hidden"     name="Idprofessor"   value="<?php echo isset($professor) ? $professor->Idprofessor : null ?>">
<input type="submit">
</form>
<a href="listarprodutos.php">volta</a>
</body>
</html>