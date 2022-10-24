<?php
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
    header('location: /Aulasphp/TCC/LOGIN/pageLogin.html');
}
$id_agendamento = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$id_recado = $_GET['id'];

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_recado,descricao_recado, tipo_recado,data_recado,nome_usuario 
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

    <div class="container">
        <?php foreach ($resultado as $row) { ?>

      <input type="text" class="form-control" value="<?php echo $row['descricao_recado']; ?>">

        <?php     } ?>
    </div>

</body>

</html>