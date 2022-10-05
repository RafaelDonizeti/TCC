<?php
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_local, nome_local,data_agendamento,id_agendamento, nome_usuario
from locais 
inner join agendamentos on id_local = id_local_fk
inner join usuarios on id_usuario = id_usuario_fk ORDER by data_agendamento desc; "; // Expressão SQL que irá ser executada
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <title>Agendamentos </title>

    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>


</head>

<body>


    <div class="row">
        <div class="col-md-4">
            <form action="cadastrarAgendamento.php" method="get">

                <div class="ms-5 mt-5">
                    <h3>AGENDE AQUI OS DIAS PARA</h3>
                    <h3>USAR OS ESPAÇOS DO CONDOMÍNIO</h3>
                    <div>
                        <label> Informe o Local:</label> <br />
                        <select name="locais" class="form-select border-secondary" required>
                            <option value="">Escolha um local</option>
                            <?php foreach ($resultadol as $row) { ?>
                                <option value="<?php echo $row['id_local'] ?>"> <?php echo $row['nome_local'] ?> </option>
                            <?php     } ?>
                            </option>
                        </select><br>

                        <label>Informe o Dia: </label>
                        <input type="text" id="calendar" name="data_agendamento" class="form-select border-secondary" autocomplete="off" placeholder="Informe o Dia"><br>

                        <label>Quem Fará Uso? </label>
                        <select name="usuarios" class="form-select border-secondary" required>
                            <option value="">Selecione o Usuário</option>
                            <?php foreach ($resultadoUsers as $row) { ?>
                                <option value="<?php echo $row['id_usuario'] ?>"> <?php echo $row['nome_usuario'] ?> </option>
                            <?php     } ?>
                            </option>
                        </select><br>
                    </div><br>
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                    <input type="reset" value="Limpar" class="btn btn-danger" formnovalidate>
                </div>
            </form>

        </div>

        <div class="col mt-5 mx-5">
            <table class="table table-bordered  ">
                <tr>
                    <th> Local</th>
                    <th> Dia agendado</th>
                    <th>Usuário </th>
                    <th> </th>
                    <th></th>
                </tr>

                <?php foreach ($resultado as $row) { ?>
                    <tr>
                        <td><?php echo ucwords($row['nome_local']); ?> </td>
                        <td><?php echo date("d/m/Y", strtotime($row['data_agendamento'])); ?> </td>
                        <td><?php echo ucwords($row['nome_usuario']); ?> </td>
                        <td><a href="editaAgendamento.php?id=<?php echo $row['id_agendamento']; ?>"> Editar </a> </td>
                        
                        <td><a href="javascript:if(confirm('Deseja excluir esse registro?')) {location='deletaAgendamento.php?id=<?php echo $row['id_agendamento']; ?>';}" class=""> Deletar </a> </td>
                    <?php     } ?>


        </div>




        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>

</html>