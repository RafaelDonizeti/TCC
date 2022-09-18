<?php

$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "select id_usuario, nome_usuario from usuarios"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultadob = array(); // Cria um array para receber o resultado
$queryb = "select id_bloco, bloco from blocos"; // Expressão SQL que irá ser executada
$resultb = mysqli_query($con, $queryb); // Executa a consulta com base na query
$resultadob = $resultb->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultados = array(); // Cria um array para receber o resultado
$querys = "SELECT id_situacao_imovel, situacao_imovel from situacoes_imoveis"; // Expressão SQL que irá ser executada
$results = mysqli_query($con, $querys); // Executa a consulta com base na query
$resultados = $results->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultadoIM = array(); // Cria um array para receber o resultado
$queryIM = "SELECT id_imovel, numero_imovel,bloco, situacao_imovel from imoveis 
inner join situacoes_imoveis on id_situacao_fk = id_situacao_imovel
inner join blocos on id_bloco_fk = id_bloco"; // Expressão SQL que irá ser executada
$resultIM = mysqli_query($con, $queryIM); // Executa a consulta com base na query
$resultadoIM = $resultIM->fetch_all(MYSQLI_ASSOC); // Faz uma associação


?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <title> Cadastro de Imóvel </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>

</head>

<body>


    <div class="row">
        <div class="col-md-4">
            <form name="Cadastro " method="GET" action="cadastrarImovel.php">

                <div class="ms-5 mt-5">
                    <h3> INFORME OS DADOS DO IMÓVEL : </h3>
                    <label> Número: </label> <br />
                    <input type="number" class="form-control" name="numero" size="10"> <br />

                    <label> Bloco: </label> <br />
                    <select name="bloco" class="form-select">
                        <option value="">
                            <?php foreach ($resultadob as $row) { ?>
                        <option value="<?php echo $row['id_bloco'] ?>"> <?php echo $row['bloco'] ?> </option>
                    <?php     } ?>
                    </option>
                    </select> <br>

                    <label> Situação: </label> <br />
                    <select name="situacao" class="form-select">
                        <option selected>Selecione a situação do imóvel</option>
                        <?php foreach ($resultados as $row) { ?>
                            <option value="<?php echo $row['id_situacao_imovel'] ?>"> <?php echo $row['situacao_imovel'] ?> </option>
                        <?php     } ?>
                    </select> <br />
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                    <input type="reset" value="Limpar" class="btn btn-secondary">
                </div>


            </form>
        </div>

        <div class="col mt-5 mx-5">
            <table class="table table-bordered  ">
                <tr>
                    <th>ID</th>
                    <th>NÚMERO</th>
                    <th>BLOCO</th>
                    <th>SITUAÇÃO</th>
                </tr>

                <?php foreach ($resultadoIM as $row) { ?>
                    <tr>
                        <td><?php echo $row['id_imovel']; ?> </td>
                        <td><?php echo $row['numero_imovel']; ?> </td>
                        <td><?php echo $row['bloco']; ?> </td>
                        <td><?php echo $row['situacao_imovel']; ?> </td>
                    <?php   } ?>
                    </tr>

            </table>
        </div>
    </div>



</body>

</html>