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

$id_situacao = $_POST['situacao'];

$resultadoIM = array(); // Cria um array para receber o resultado
$queryIM = 

"SELECT id_imovel, numero_imovel,bloco, situacao_imovel,id_situacao_fk 
from imoveis 
inner join situacoes_imoveis on id_situacao_fk = id_situacao_imovel
inner join blocos on id_bloco_fk = id_bloco 
where id_situacao_fk = '$id_situacao'"; 

// Expressão SQL que irá ser executada
$resultIM = mysqli_query($con, $queryIM); // Executa a consulta com base na query
$resultadoIM = $resultIM->fetch_all(MYSQLI_ASSOC); // Faz uma associação
$verificaresultado = mysqli_num_rows($resultIM);

if ($verificaresultado === 0) {
    echo 'Nenhum registro encontrado';
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <title> Cadastro de Imóvel </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="print" href="ocultarElementos.css" />

</head>

<body>
    <h1 class="display-5 text-center mt-5"> Relatório de Imóveis</h1>
    <div class="col mt-5 mx-5">
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th>NÚMERO</th>
                    <th>BLOCO</th>
                    <th>SITUAÇÃO</th>

                </tr>
            </thead>

            <?php foreach ($resultadoIM as $row) { ?>
                <tr>

                    <td><?php echo $row['numero_imovel']; ?> </td>
                    <td><?php echo ucwords($row['bloco']); ?> </td>
                    <td><?php echo $row['situacao_imovel']; ?> </td>

                <?php   } ?>
                </tr>

        </table>
        <div class="formulario">
            <input type="button" value="Gerar PDF" onclick=" window.print();" class="btn btn-secondary sm ">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>