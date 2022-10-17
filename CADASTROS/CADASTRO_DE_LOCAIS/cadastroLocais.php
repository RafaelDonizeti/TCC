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
$query = "select id_local, nome_local from locais"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação
?>




<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Cadastro de Locais </title>

  <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>


</head>

<body>


  <div class="row">
    <div class="col-md-4">
      <form action="cadastrarLocal.php" method="get">

        <div class="ms-5 mt-5">
          <h3>CADASTRE AQUI OS LOCAIS</h3>
          <h3>DO CONDOMÍNIO</h3>
          <div>
            <label> Nome do Local:</label> <br />
            <input type="text" class="form-control border border-1 border-secondary" name="nome_local" autocomplete="off"> <br />
            <input type="submit" value="Cadastrar" class="btn btn-primary">
            <a class="btn btn-danger" href="/Aulasphp/TCC/HOME_CADASTROS/homeCadastros.php">Voltar</a>
          </div>

        </div>
      </form>

    </div>

    <div class="col mt-5 mx-5">
      <table class="table table-bordered  ">
        <tr>
          <th> NOME DO LOCAL</th>
          <th> </th>
        </tr>

        <?php foreach ($resultado as $row) { ?>
          <tr>

            <td><?php echo ucwords( $row['nome_local']); ?> </td>

            <td><a href="javascript:if(confirm('Deseja excluir esse registro?')) {location='deletaLocal.php?id=<?php echo $row['id_local']; ?>';}" class="text-danger"> Deletar </a> </td>
          <?php   } ?>


    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>