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

$resultado = array(); // Cria um array para receber o resultado
$query = "SELECT id_usuario, nome_usuario, telefone_usuario, email_usuario, tipo_usuario_fk, id_imovel_fk,tipo_usuario,numero_imovel 
	from usuarios 
	inner join tipos_usuarios on id_tipo_usuario = tipo_usuario_fk 
	inner join imoveis on id_imovel_fk = id_imovel"; // Expressão SQL que irá ser executada
$result = mysqli_query($con, $query); // Executa a consulta com base na query
$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação

?>


<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8" />
	<title> Consulta de Usuários </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<?php include('/xampp/htdocs/Aulasphp/TCC/BASES/barra.php') ?>

</head>

<body>
	<div class="container mt-5">
		<div class="table-responsive">
			<table class="table table-bordered ">
				<tr>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Email</th>
					<th>Tipo</th>
					<th>Imóvel</th>
					<th colspan="3">Ações</th>
				</tr>

				<?php foreach ($resultado as $row) { ?>
					<tr>					
						<td><?php echo $row['nome_usuario']; ?> </td>
						<td><?php echo $row['telefone_usuario']; ?></td>
						<td><?php echo $row['email_usuario']; ?></td>
						<td><?php echo $row['tipo_usuario']; ?></td>
						<td><?php echo $row['numero_imovel']; ?></td>
						<td><a href="editaUsuario.php?id=<?php echo $row['id_usuario']; ?>"> Editar </a> </td>
						<td><a class="text-danger" href="javascript:if(confirm('Deseja excluir esse registro?')) {location='deletaUsuario.php?id=<?php echo $row['id_usuario']; ?>';}"> Deletar </a> </td>
					</tr>
				<?php 	} ?>

			</table>
			<a href="/Aulasphp/TCC/CADASTROS/CADASTRO_DE_USUARIOS/cadastroUsuario.php">
				<button class="btn btn-danger">Voltar </button>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>