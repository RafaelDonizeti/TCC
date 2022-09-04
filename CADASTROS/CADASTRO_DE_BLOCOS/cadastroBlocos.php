<?php
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
  echo "erro ao conectar na base de dados: " .
    mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "select id_bloco, bloco from blocos"; // Expressão SQL que irá ser executada
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
  <?php include ('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php')?>

</head>

<body>


  <div class="row">
    <div class="col-md-4">
      <form action="cadastrarLocal.php" method="get">

        <div class="ms-5 mt-5">
          <h3>CADASTRE AQUI OS BLOCOS</h3>
          <h3>DO CONDOMÍNIO</h3>
          <div>
            <label> NOME DO LOCAL</label> <br />
            <input type="text" class="form-control border border-1 border-primary" name="nome_local"> <br />
            <input type="submit" value="Cadastrar" class="btn btn-primary">
            <input type="reset" value="Limpar" class="btn btn-secondary">
          </div>

        </div>
      </form>

    </div>

    <div class="col mt-5 mx-5">
      <table class="table table-bordered  ">
        <tr>
          <th> ID</th>
          <th> BLOCO</th>
          <th> </th>
        </tr>

        <?php foreach ($resultado as $row) { ?>
          <tr>
            <td><?php echo $row['id_bloco']; ?> </td>
            <td><?php echo $row['bloco']; ?> </td>
            <td><a href="javascript:if(confirm('Deseja excluir esse registro?')) {location='deletaBloco.php?id=<?php echo $row['id_bloco']; ?>';}" class=""> Deletar </a> </td>
          <?php   } ?>


    </div>

</body>

</html>