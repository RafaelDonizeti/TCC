<?php
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
   header('location: /Aulasphp/TCC/LOGIN/pageLogin.html');
}
$id_despesa = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_despesa, despesa, valor_despesa, data_despesa,id_conta,conta 
from despesas 
inner join contas on id_conta = id_conta_fk
where id_despesa = $id_despesa "; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação


//consulta dos tipos de contas
$resultadoC = array(); // Cria um array para receber o resultado
$queryC = "SELECT id_conta, conta from contas "; // Expressão SQL que irá ser executada
$resultC = mysqli_query($con, $queryC); // Executa a consulta com base na query
$resultadoC = $resultC->fetch_all(MYSQLI_ASSOC); // Faz uma associação
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pretação de Contas</title>
    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#calendar").datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            });
        });
    </script>
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <?php foreach ($resultado as $row) { ?>
            <div class="row">
                <div class="col-md-12">
                    <form action="atualizaDespesa.php" method="get">

                        <div class="ms-5 mt-5">
                            <h1>Editar Despesa</h1>
                            <h3></h3>
                            <div>
                                <label> Despesa: </label> <br />
                                <input type="text" class="form-control border border-1 border-secondary" name="despesa" value="<?php echo $row['despesa']; ?>"> <br />
                                <input type="hidden" name="id" value=<?php echo $row['id_despesa']; ?>>

                                <label> Valor: </label> <br />
                                <input type="text" class="form-control border border-1 border-secondary" name="valor" value="<?php echo number_format($row['valor_despesa'], 2, ',', '.'); ?>"> <br />


                                <label> Data: </label> <br />
                                <input type="text" id="calendar" class="form-select border border-1 border-secondary" name="data" value="<?php echo date("d/m/Y", strtotime($row['data_despesa'])); ?>"> <br />

                                <label> Tipo: </label> <br />
                                <select name="conta" class="form-select border border-1 border-secondary">
                                    <option value="<?php echo $row['id_conta']; ?>"><?php echo $row['conta']; ?></option>
                                    <?php foreach ($resultadoC as $row) { ?>
                                        <option value="<?php echo $row['id_conta'] ?>"> <?php echo $row['conta'] ?> </option>
                                    <?php     } ?>
                                </select><br>
                            </div>
                            <input type="submit" value="Atualizar" class="btn btn-success">
                            <a class="btn btn-danger" href="/Aulasphp/TCC/PRESTACAO_CONTAS/cadastroDespesa.php">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php     } ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>