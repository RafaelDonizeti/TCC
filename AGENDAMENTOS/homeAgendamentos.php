<?php
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_local, nome_local,data_agendamento,id_agendamento from locais inner join agendamentos on id_local = id_local_fk "; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação


$resultadol = array(); // Cria um array para receber o resultado
$queryl = "SELECT id_local, nome_local from locais "; // Expressão SQL que irá ser executada
$resultl = mysqli_query($con, $queryl); // Executa a consulta com base na query
$resultadol = $resultl->fetch_all(MYSQLI_ASSOC); // Faz uma associação
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Agendamentos </title>

    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>


</head>

<body>


    <div class="row">
        <div class="col-md-4">
            <form action="cadastrarAgendamento.php" method="get">

                <div class="ms-5 mt-5">
                    <h3>AGENDE AQUI O DIA PARA</h3>
                    <h3>USAR OS ESPAÇOS DO CONDOMÍNIO</h3>
                    <div>
                        <label> INFORME QUAL O LOCAL</label> <br />
                        <select name="locais" class="form-select">
                            <option>Escolha um local</option>
                            <?php foreach ($resultadol as $row) { ?>
                                <option value="<?php echo $row['id_local'] ?>"> <?php echo $row['nome_local'] ?> </option>
                            <?php     } ?>
                            </option>
                        </select><br>

                        <label>INFORME O DIA </label>
                        <input type="date" name="data_agendamento" class="form-select">
                    </div><br>
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                    <input type="reset" value="Limpar" class="btn btn-secondary">
                </div>
            </form>

        </div>

        <div class="col mt-5 mx-5">
            <table class="table table-bordered  ">
                <tr>
                    <th> Local</th>
                    <th> Dia agendado</th>
                    <th> </th>
                </tr>

                <?php foreach ($resultado as $row) { ?>
                    <tr>
                        <td><?php echo $row['nome_local']; ?> </td>
                        <td><?php echo date ("d/m/Y", strtotime ($row['data_agendamento'])); ?> </td>
                        <td><a href="javascript:if(confirm('Deseja excluir esse registro?')) {location='deletaBloco.php?id=<?php echo $row['id_agendamento']; ?>';}" class=""> Deletar </a> </td>
                    <?php     } ?>

                    
        </div>





</body>

</html>
