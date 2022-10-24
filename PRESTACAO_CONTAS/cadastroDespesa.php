<meta charset="UTF-8">
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

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_despesa, despesa, valor_despesa, data_despesa, id_conta_fk,conta
from despesas 
inner join contas on id_conta_fk = id_conta
order by data_despesa desc; "; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação

//consulta dos tipos de contas
$resultadoC = array(); // Cria um array para receber o resultado
$queryC = "SELECT id_conta, conta from contas "; // Expressão SQL que irá ser executada
$resultC = mysqli_query($con, $queryC); // Executa a consulta com base na query
$resultadoC = $resultC->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultadoTotal = array(); // Cria um array para receber o resultado
$queryTotal = "SELECT SUM(valor_despesa) as total from despesas;";; // Expressão SQL que irá ser executada
$resultTotal = mysqli_query($con, $queryTotal); // Executa a consulta com base na query
$resultadoTotal = $resultTotal->fetch_all(MYSQLI_ASSOC); // Faz uma associação


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
</head>

<body>
    <div class="row">
        <div class="col-md-4">
            <form action="cadastrarDespesa.php" method="get">
                <div class="ms-5 mt-5">
                    <h3 class="display-6 fs-3">PRESTAÇÃO DE</h3>
                    <h3 class="display-6 fs-3">CONTAS</h3>
                    <div>
                        <label> Despesa: </label> <br />
                        <input type="text" class="form-control border border-1 border-secondary" name="despesa" required> <br />

                        <label> Valor: </label> <br />
                        <input type="text" class="form-control border border-1 border-secondary" name="valor" required> <br />

                        <label> Data: </label> <br />
                        <input type="date" class="form-control border border-1 border-secondary" name="data" required> <br />

                        <label> Tipo: </label> <br />
                        <select name="tipo" class="form-select border-secondary" required>
                            <option value="">Informe o Tipo</option>
                            <?php foreach ($resultadoC as $row) { ?>
                                <option value="<?php echo $row['id_conta'] ?>"> <?php echo $row['conta'] ?> </option>
                            <?php     } ?>
                            </option>
                        </select><br>
                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                        <input type="reset" value="Cancelar" class="btn btn-danger">
                    </div>

                </div>
            </form>

        </div>

        <div class="table-responsive col mt-4 mx-5">
            <table class="table table-bordered " id="tabela">
                <thead>
                    <tr>
                        <th>DESPESA</th>
                        <th>TIPO</th>
                        <th>VALOR </th>
                        <th>DATA </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <?php foreach ($resultado as $row) { ?>
                    <tr>
                        <td><?php echo ucwords($row['despesa']); ?> </td>
                        <td><?php echo ucwords($row['conta']); ?> </td>
                        <td>R$ <?php echo number_format($row['valor_despesa'], 2, ',', '.'); ?> </td>
                        <td><?php echo date("d/m/Y", strtotime($row['data_despesa'])); ?> </td>
                        <td><a href="editaDespesa.php?id=<?php echo $row['id_despesa']; ?>"> Editar </a> </td>
                        <td><a href="javascript:if(confirm('Deseja excluir esse registro?')) {location='deletaDespesa.php?id=<?php echo $row['id_despesa']; ?>';}" class="text-danger"> Deletar </a> </td>
                    <?php   } ?>
                    </tr>
            </table>

            <?php //foreach ($resultadoTotal as $row) {  
            ?>
            <!-- <label for="total">Total das Despesas </label>
               <input name="total" type="text" readonly value="<?php // $row['total']  
                                                                ?>">
            <? //php// } 
            ?>-->

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>