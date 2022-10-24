<?php
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
    header('location: /Aulasphp/TCC/LOGIN/pageLogin.html');
}
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}


$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

if ($data_inicial > $data_final) {
    echo "A data inicial não pode ser maior que a data final ";
}


$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_despesa, despesa, valor_despesa, data_despesa, id_conta_fk,conta
from despesas 
inner join contas on id_conta_fk = id_conta
where data_despesa between '$data_inicial' and '$data_final' 
order by data_despesa desc; "; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação
$verificaresultado = mysqli_num_rows($result);

if ($verificaresultado === 0){
    echo 'Não existem registros nesse período';
}

$resultadoSD = array(); // soma despesa
$querySD = "SELECT SUM(valor_despesa) as totald
from despesas 
inner join contas on id_conta_fk = id_conta
where data_despesa between '$data_inicial' and '$data_final';";
$resultSD = mysqli_query($con, $querySD);
$resultadoSD = $resultSD->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Despesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="row">


        <div class="table-responsive col mt-4 mx-5">
            <table class="table table-bordered " id="tabela">
                <thead>
                    <tr>
                        <th>DESPESA</th>
                        <th>TIPO</th>
                        <th>VALOR </th>
                        <th>DATA </th>

                    </tr>
                </thead>

                <?php foreach ($resultado as $row) { ?>
                    <tr>

                        <td><?php echo ucwords($row['despesa']); ?> </td>
                        <td><?php echo ucwords($row['conta']); ?> </td>
                        <td>R$ <?php echo number_format($row['valor_despesa'], 2, ',', '.'); ?> </td>
                        <td><?php echo date("d/m/Y", strtotime($row['data_despesa'])); ?> </td>

                    <?php   } ?>
                    </tr>
            </table>
            <label >Total das Despesas no Período:</label>
            <?php
            foreach ($resultadoSD as $rowsd) {
                echo "R$".  $rowsd['totald'];
            }
            ?><br><br>
            <a href="/Aulasphp/TCC/CONSULTAS/homeConsultas.php">
                <button class="btn btn-danger sm">Voltar </button>
            </a>
        </div>

    </div>

</body>

</html>