<?php
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
    header('location: /Aulasphp/TCC/LOGIN/pageLogin.php');
}
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$id_usuario = $_POST['usuarios'];

$resultado = array(); // Cria um array para receber o resultado
$query = 

"SELECT id_usuario, id_local, nome_local,data_agendamento,id_agendamento, nome_usuario
from locais 
inner join agendamentos on id_local = id_local_fk
inner join usuarios on id_usuario_fk = id_usuario
where id_usuario = '$id_usuario' "; 

// Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação
$verificaresultado = mysqli_num_rows($result);

if ($verificaresultado === 0) {
    echo 'Nenhum registro encontrado';
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="print" href="ocultarElementos.css" />
    <title>Consulta Agendamentos</title>

</head>

<body>
    <h1 class="display-5 mt-5 text-center">Relatório de Agendamentos</h1>
    <div class="col mt-5 mx-5">

        <table class="table table-bordered  ">
            <thead>
                <tr>
                    <th>Local</th>
                    <th>Dia agendado</th>
                    <th>Usuário </th>
                </tr>
            </thead>

            <?php foreach ($resultado as $row) { ?>
                <tr>
                    <td><?php echo ucwords($row['nome_local']); ?> </td>
                    <td><?php echo date("d/m/Y", strtotime($row['data_agendamento'])); ?> </td>
                    <td><?php echo ucwords($row['nome_usuario']); ?> </td>
                </tr>
            <?php     } ?>
        </table>
        <div class="formulario">
        <input type="button" value="Gerar PDF" onclick=" window.print();" class="btn btn-secondary sm ">
    </div>
    </div>
   

</body>


</html>