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

// query para exibir os dados
$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT descricao_recado, tipo_recado,data_recado,nome_usuario 
from mural_de_recados 
INNER JOIN tipos_recados on tipo_recado_fk = id_tipo_recado 
inner join usuarios on id_usuario_fk = id_usuario
ORDER BY data_recado desc"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação

//query para exbir os tipos de recado
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


  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">



      <a class="navbar-brand" href="/Aulasphp/TCC/LOGIN/sair.php">Sair</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup"></div>

    </div>
  </nav>
</head>

<body>

  <h3 class="text-center mt-5">MURAL </h3>


  
  

  <?php foreach ($resultado as $row) { ?>
    <div class="container mt-5">
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