<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: " .
        mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_tipo_usuario, tipo_usuario from tipos_usuarios"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação 


$resultadoNI = array(); // Cria um array para receber o resultado
$queryNI = "SELECT id_imovel, numero_imovel from imoveis"; // Expressão SQL que irá ser executada
$resultNI = mysqli_query($con, $queryNI); // Executa a consulta com base na query
$resultadoNI = $resultNI->fetch_all(MYSQLI_ASSOC); // Faz uma associação 
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Cadastro de Usuário </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>

</head>

<body>

    <div class="container mt-5">
        <form name="" method="GET" action="cadastrarUsuario.php">
            <div class="container">
                <?php
                if (isset($_SESSION['status'])) {
                    echo $_SESSION['status'];
                    unset($_SESSION['status']);
                } ?>
                <h3>INFORME OS DADOS DO USUÁRIO</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label> Nome: </label> <br />
                        <input type="text" class="form-control" name="nome" required> <br />

                        <label> Telefone: </label> <br />
                        <input type="text" class="form-control" name="telefone" maxlength="14" required> <br />

                        <label> E-mail: </label> <br />
                        <input type="email" class="form-control" name="email" required> <br />


                    </div>

                    <div class="col-md-6">

                        <label> Tipo: </label> <br />
                        <select name="tipo" class="form-select" required>
                            <option value="">Selecione o tipo de usuário</option>
                            <?php foreach ($resultado as $row) { ?>
                                <option value="<?php echo $row['id_tipo_usuario'] ?>"> <?php echo $row['tipo_usuario'] ?> </option>
                            <?php     } ?>
                        </select> <br />

                        <label> Imóvel: </label> <br />
                        <select name="imovel" class="form-select" required>
                            <option value="">Selecione o Imóvel...</option>
                            <?php foreach ($resultadoNI as $rowNI) { ?>
                                <option value="<?php echo $rowNI['id_imovel'] ?>"> <?php echo $rowNI['numero_imovel'] ?> </option>
                            <?php     } ?>

                        </select>
                        <br>
                        <label> Senha: </label> <br />
                        <input type="text" class="form-control" name="senha" required> <br />
                    </div>

                </div>
                <input type="submit" value="Cadastrar" class="btn btn-primary">
                <input type="reset" value="Limpar" class="btn btn-secondary">


        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>