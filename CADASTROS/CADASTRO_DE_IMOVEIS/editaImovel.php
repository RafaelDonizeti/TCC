<?php
$id_imovel = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultadoIM = array(); // Cria um array para receber o resultado
$queryIM = "SELECT id_imovel, numero_imovel,bloco, situacao_imovel,id_bloco,id_situacao_imovel from imoveis 
inner join situacoes_imoveis on id_situacao_fk = id_situacao_imovel
inner join blocos on id_bloco_fk = id_bloco
where id_imovel = $id_imovel"; // Expressão SQL que irá ser executada
$resultIM = mysqli_query($con, $queryIM); // Executa a consulta com base na query
$resultadoIM = $resultIM->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultadob = array(); // Cria um array para receber o resultado
$queryb = "select id_bloco, bloco from blocos"; // Expressão SQL que irá ser executada
$resultb = mysqli_query($con, $queryb); // Executa a consulta com base na query
$resultadob = $resultb->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultados = array(); // Cria um array para receber o resultado
$querys = "SELECT id_situacao_imovel, situacao_imovel from situacoes_imoveis"; // Expressão SQL que irá ser executada
$results = mysqli_query($con, $querys); // Executa a consulta com base na query
$resultados = $results->fetch_all(MYSQLI_ASSOC); // Faz uma associação

?>

<head>
    <meta charset="utf-8" />
    <title> Editar Imóvel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>

</head>

<body>
    <form action="atualiza_imovel.php" method="get">


        <?php foreach ($resultadoIM as $row) { ?>

            <div class="col-md-6">
                <div>
                    <h5>Alterar Dados do Imóvel</h5><br />
                    

                    <input type="hidden" name="id" value=<?php echo $row['id_imovel'];?>>

                    <label> Número:</label>
                    <input type="text" name="numero" value="<?php echo $row['numero_imovel']; ?>" class="form-control">

                    <label> Bloco: </label> <br />
                    <select name="bloco" class="form-select">

                        <option value="<?php echo $row['id_bloco']; ?> "><?php echo $row['bloco']; ?></option>

                        <?php foreach ($resultadob as $row) { ?>
                            <option value="<?php echo $row['id_bloco'] ?>"> <?php echo $row['bloco'] ?> </option>
                        <?php     } ?>
                    </select> <br>


                <?php     } ?>

                <?php foreach ($resultadoIM as $row) { ?>

                    <div class="col-md-6">
                        <div>
                            <label> Situação: </label> <br />
                            <select name="situacao" class="form-select">

                                <option value="<?php echo $row['id_situacao_imovel']; ?> "><?php echo $row['situacao_imovel']; ?></option>

                                <?php foreach ($resultados as $row) { ?>
                                    <option value="<?php echo $row['id_situacao_imovel'] ?>"> <?php echo $row['situacao_imovel'] ?> </option>
                                <?php     } ?>
                            </select> <br>
                        </div>
                    </div>
                <?php     } ?>

                </div><br>
               
                <input type="submit" value="Atualizar" class="btn btn-success">

            </div>
    </form>