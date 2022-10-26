<?php
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
    header('location: /Aulasphp/TCC/LOGIN/pageLogin.php');
}
$id_recado = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultadoTR = array(); // Cria um array para receber o resultado
$queryTR = "SELECT id_tipo_recado, tipo_recado from tipos_recados "; // Expressão SQL que irá ser executada
$resultTR = mysqli_query($con, $queryTR); // Executa a consulta com base na query
$resultadoTR = $resultTR->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_tipo_recado,id_recado,descricao_recado, tipo_recado,data_recado,nome_usuario 
from mural_de_recados 
INNER JOIN tipos_recados on tipo_recado_fk = id_tipo_recado 
inner join usuarios on id_usuario_fk = id_usuario
where id_recado = '$id_recado'"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mural</title>

    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>
</head>

<body>


    <form action="atualizaRecado.php" method="get">

        <div class="container mt-5">

            <label> Recado:</label><br>
            <?php foreach ($resultado as $row) { ?>
                <select name="tipos" id="" class="form-select">
                    <option value="<?php echo $row['id_tipo_recado'] ?>"> <?php echo $row['tipo_recado'] ?> </option>
                    <?php foreach ($resultadoTR as $rowTR) { ?>
                        <option value="<?php echo $rowTR['id_tipo_recado'] ?>"><?php echo $rowTR['tipo_recado'] ?></option>
                    <?php     } ?>
                </select><br>

                <textarea class="form-control" maxlength="1330" cols="30" rows="10" name="recado"><?php echo $row['descricao_recado']; ?></textarea>
            <?php     } ?><br>

            <input type="hidden" name="id" value=<?php echo $row['id_recado']; ?>>
            <input type="submit" value="Atualizar" class="btn btn-success">
            <a class="btn btn-danger" href="/Aulasphp/TCC/MURAL/muralRecados.php"> Voltar</a>
        </div>
    </form>

</body>

</html>