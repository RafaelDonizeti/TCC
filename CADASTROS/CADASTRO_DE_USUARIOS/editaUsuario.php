<?php
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
   header('location: /Aulasphp/TCC/LOGIN/pageLogin.html');
}
$id_usuario = $_GET['id'];
$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
	echo "erro ao conectar na base de dados: " .
		mysqli_connect_errno();
}

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_tipo_usuario, id_usuario, nome_usuario, telefone_usuario,email_usuario,tipo_usuario_fk,id_imovel_fk,tipo_usuario,numero_imovel,id_imovel
from usuarios 
inner join tipos_usuarios on tipo_usuario_fk = id_tipo_usuario 
inner join imoveis on id_imovel_fk = id_imovel 
where id_usuario = $id_usuario"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação


$resultadoTU = array(); // Cria um array para receber o resultado
$queryTU = "SELECT id_tipo_usuario, tipo_usuario from tipos_usuarios"; // Expressão SQL que irá ser executada
$resultTU = mysqli_query($con, $queryTU); // Executa a consulta com base na query
$resultadoTU = $resultTU->fetch_all(MYSQLI_ASSOC); // Faz uma associação 


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
	<title>Editar Usuário</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>
</head>

<body>
	<form method="GET" action="atualizaUsuario.php">
		<div class="container mt-5">
			<div class="row">
				<h1> ALTERAR DADOS DO USUÁRIO </h1>
				<?php foreach ($resultado as $row) { ?>
					<tr>
						<div class="col-md-6">

							<label> Nome:</label>
							<input type="text" class="form-control" name="nome" value="<?php echo $row['nome_usuario']; ?>"><br>

							<label> Telefone:</label>
							<input type="text" class="form-control" name="telefone" value="<?php echo $row['telefone_usuario']; ?>"><br>

							<label> E-mail:</label>
							<input type="text" class="form-control" name="email" value="<?php echo $row['email_usuario']; ?>"><br>

						</div>

						<div class="col-md-6">

							<label> Tipo:</label>
							<select name="tipo" class="form-select">
								<option value="<?php echo $row['id_tipo_usuario'] ?>"> <?php echo $row['tipo_usuario'] ?>
									<?php foreach ($resultadoTU as $rowTU) { ?>
								<option value="<?php echo $rowTU['id_tipo_usuario'] ?>"> <?php echo $rowTU['tipo_usuario'] ?> </option>
							<?php     } ?>
							</select> <br />

							<label> Imóvel:</label>
							<select name="imovel" class="form-select">

								<option value="<?php echo $row['id_imovel'] ?>"> <?php echo $row['numero_imovel'] ?></option>

								<?php foreach ($resultadoNI as $rowNI) { ?>
									<option value="<?php echo $rowNI['id_imovel'] ?>"> <?php echo $rowNI['numero_imovel'] ?> </option>
								<?php     } ?>

							</select>


						</div>
					</tr>

				<?php 	} ?>

			</div>
			<input type="hidden" name="id" value=<?php echo $row['id_usuario']; ?>>
			<input type="submit" value="Atualizar" class="btn btn-success">

		</div>
	</form>
</body>

</html>