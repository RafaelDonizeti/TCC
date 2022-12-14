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
$resultados = array(); //situações // Cria um array para receber o resultado
$querys = "SELECT id_situacao_imovel, situacao_imovel from situacoes_imoveis"; // Expressão SQL que irá ser executada
$results = mysqli_query($con, $querys); // Executa a consulta com base na query
$resultados = $results->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_tipo_usuario, tipo_usuario from tipos_usuarios"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação 

$resultadoUsers = array(); // Cria um array para receber o resultado
$queryUsers = "SELECT id_usuario, nome_usuario from usuarios "; // Expressão SQL que irá ser executada
$resultUsers = mysqli_query($con, $queryUsers); // Executa a consulta com base na query
$resultadoUsers = $resultUsers->fetch_all(MYSQLI_ASSOC); // Faz uma associação
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Consultas</title>
    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>
</head>

<body>
<h3 class="display-4 text-center mt-4"> Relatórios</h3>
    <div class="container text-center position-absolute top-50 start-50 translate-middle ms-5">
        
        <div class="row">
            <div class="card ms-5 border border-secondary" style="width: 18rem;">
                <div class="card-body">
                    <br><br>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Relatório de Despesas
                    </button><br><br>
                </div>
            </div><br>

            <div class="card ms-5 border border-secondary" style="width: 18rem;">
                <div class="card-body">
                    <br><br>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalimoveis">
                        Relatório de Imóveis
                    </button><br><br>
                </div>
            </div><br>

            <div class="card ms-5 border border-secondary" style="width: 18rem;">
                <div class="card-body">
                    <br><br>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalagendamentos">
                        Relatório de Agendamentos
                    </button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal despesas -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Despesas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/Aulasphp/TCC/CONSULTAS/consultaDespesasData.php" method="post">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ms-auto">
                                    <label>Data Inicial</label>
                                    <input type="date" name="data_inicial" class="form-control " required>
                                </div>
                                <div class="col-md-6 ms-auto">
                                    <label>Data Final</label>
                                    <input type="date" name="data_final" class="form-control" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>
                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal imoveis -->
    <div class="modal fade" id="modalimoveis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Imóveis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/Aulasphp/TCC/CONSULTAS/consultaImoveis.php" method="post">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ms-auto">
                                    <label>Situação</label>
                                    <select name="situacao" class="form-select border-secondary" required>
                                        <option value="">Selecione a Situação</option>
                                        <?php foreach ($resultados as $row) { ?>
                                            <option value="<?php echo $row['id_situacao_imovel'] ?>"> <?php echo $row['situacao_imovel'] ?> </option>
                                        <?php     } ?>
                                    </select> <br />
                                </div>
                                <div class="col-md-6 ms-auto">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>
                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Agendamentos -->
    <div class="modal fade" id="modalagendamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agendamentos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/Aulasphp/TCC/CONSULTAS/consultaAgendamentosNome.php" method="post">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ms-auto">
                                    <label>Usuário</label>
                                    <select name="usuarios" class="form-select border-secondary" required>
                                        <option value="">Selecione o Usuário</option>
                                        <?php foreach ($resultadoUsers as $row) { ?>
                                            <option value="<?php echo $row['id_usuario'] ?>"> <?php echo $row['nome_usuario'] ?> </option>
                                        <?php     } ?>
                                        </option>
                                    </select><br>
                                </div>
                                <div class="col-md-6 ms-auto">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>
                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>