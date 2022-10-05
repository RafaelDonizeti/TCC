<meta charset="UTF-8">
<?php
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
  echo "erro ao conectar na base de dados: " .
    mysqli_connect_errno();
}

// query para exibir os dados
$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT descricao_recado, tipo_recado,data_recado,nome_usuario 
from mural_de_recados 
INNER JOIN tipos_recados on tipo_recado_fk = id_tipo_recado 
inner join usuarios on id_usuario_fk = id_usuario
ORDER BY data_recado desc"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação

$resultadoTR = array(); // Cria um array para receber o resultado
$queryTR = "SELECT id_tipo_recado, tipo_recado from tipos_recados "; // Expressão SQL que irá ser executada
$resultTR = mysqli_query($con, $queryTR); // Executa a consulta com base na query
$resultadoTR = $resultTR->fetch_all(MYSQLI_ASSOC); // Faz uma associação

?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Mural</title>

  <?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>
</head>

<body>

  <h3 class="text-center mt-5">MURAL </h3>
  <!-- Button trigger modal -->
  <div class="text-center">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Fazer Publicação
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Digite aqui seu recado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="publicarRecado.php" method="get">
            <label>Qual o tipo de recado?</label>
            <select name="tipos" id="" class="form-select" required>
              <option value="">Selecione Um Tipo de Recado... </option>
              <?php foreach ($resultadoTR as $row) { ?>
                <option value="<?php echo $row['id_tipo_recado'] ?>"> <?php echo $row['tipo_recado'] ?> </option>
              <?php     } ?>
            </select><br>
            <label> Recado</label>
            <textarea name="recado" class="form-control" cols="" rows="12" required></textarea>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Publicar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php foreach ($resultado as $row) { ?>
    <div class="container mt-5 ">
      <div class="card border-secondary">
        <div class="card-header"><?php echo $row['tipo_recado'] ?></div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">


            <P><?php echo $row['descricao_recado']; ?></P>

            <footer class="blockquote-footer"><?php echo $row['nome_usuario'] ?></footer>
          </blockquote>
        </div>
      </div>
    </div>
  <?php   } ?>
  <br>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>