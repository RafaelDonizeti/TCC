<?php
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
   header('location: /Aulasphp/TCC/LOGIN/pageLogin.php');
}
$id_agendamento = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_local, nome_local,data_agendamento,id_agendamento from locais inner join agendamentos on id_local = id_local_fk where id_agendamento = $id_agendamento"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultadol = array(); // Cria um array para receber o resultado
$queryl = "SELECT id_local, nome_local from locais "; // Expressão SQL que irá ser executada
$resultl = mysqli_query($con, $queryl); // Executa a consulta com base na query
$resultadol = $resultl->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultadoUsers = array(); // Cria um array para receber o resultado
$queryUsers = "SELECT id_usuario, nome_usuario from usuarios "; // Expressão SQL que irá ser executada
$resultUsers = mysqli_query($con, $queryUsers); // Executa a consulta com base na query
$resultadoUsers = $resultUsers->fetch_all(MYSQLI_ASSOC); // Faz uma associação
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <title> Editar Agendamento </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                minDate: new Date(<?php $hj ?>)
            });
        });
    </script>
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <form action="atualizaAgendamento.php" method="get">
            <?php foreach ($resultado as $row) { ?>
                <div class="col-md-12">
                    <div>
                        <h1> Editar Agendamento</h1> <br />
                        <label> Local:</label>
                        <input type="hidden" name="id" value=<?php echo $row['id_agendamento']; ?>>
                        <select name="locais" class="form-select border border-secondary">
                            <option value="<?php echo $row['id_local']; ?> "><?php echo $row['nome_local']; ?></option>
                            <?php foreach ($resultadol as $row) { ?>
                                <option value="<?php echo $row['id_local'] ?>"> <?php echo $row['nome_local'] ?> </option>
                            <?php     } ?>
                            <?php foreach ($resultado as $row) { ?>
                                <option value="<?php echo $row['id_local'] ?>"> <?php echo $row['nome_local'] ?> </option>
                            <?php     } ?>
                        </select><br>

                        <label> Data:</label>
                        <input type="text" class="form-control border border-secondary" name="data_agendamento" id="calendar" value="<?php echo date("d/m/Y", strtotime($row['data_agendamento'])); ?>"><br>

                        <label>Quem Fará Uso? </label>
                        <select name="usuarios" class="form-select border-secondary" required>
                            <option value="">Selecione o Usuário</option>
                            <?php foreach ($resultadoUsers as $row) { ?>
                                <option value="<?php echo $row['id_usuario'] ?>"> <?php echo $row['nome_usuario'] ?> </option>
                            <?php     } ?>
                            </option>
                        </select><br>
                    </div><br>
                    <input type="submit" value="Atualizar" class="btn btn-success">
                    <a class="btn btn-danger" href="/Aulasphp/TCC/AGENDAMENTOS/homeAgendamentos.php"> Voltar</a>
                </div>
            <?php     } ?>
        </form>
    </div><br>
</body>