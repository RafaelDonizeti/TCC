<?php

$id_usuario = $_GET['id'];
$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}

    $resultado = array(); // Cria um array para receber o resultado
	$query = "select id_usuario, nome_usuario, telefone_usuario,email_usuario,tipo_usuario,imovel_usuario from usuarios where id_usuario = $id_usuario "; // Expressão SQL que irá ser executada
	$result = mysqli_query($con,$query); // Executa a consulta com base na query
	$resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação


?>

<!DOCTYPE html>
<html lang = "pt">
	<head>
		<meta charset ="utf-8"/>
		<title>Editar Usuário</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	</head>

	<body>
		<form name = "" method = "GET " action ="atualizaUsuario.php">
			<div class="container mt-5"> 
				<div class="row">
						<h1> ALTERAR DADOS DO USUÁRIO </h1>	
						<?php foreach ($resultado as $row) 	 { ?>
								<tr>
									<div class="col-md-6">
										<label> Nome:</label>
										<input type = "text"  class="form-control"name = "nome" value = <?php echo $row['nome_usuario']; ?>><br>
										<label> Telefone:</label>
										<input type = "text" class="form-control" name = "telefone" value = <?php echo $row['telefone_usuario']; ?>><br>
										<label> E-mail:</label>
										<input type = "text" class="form-control" name = "email" value = <?php echo $row['email_usuario']; ?>><br>
									</div>

									<div class="col-md-6">
										<label> Tipo:</label>
										<input type = "text" class="form-control" name = "tipo" value = <?php echo $row['tipo_usuario']; ?>><br>
										<label> Imóvel:</label>
										<input type = "text" class="form-control" name = "imovel" value = <?php echo $row['imovel_usuario']; ?>><br>
										
									</div>	
								</tr>
						
					<?php 	} ?>
					
					<input type ="hidden" name = "id" value = <?php echo $row['id_usuario']; ?> >
						
				<a 
				href="consultaUsuarios.php">
				<input type="submit" value="Atualizar" class="btn btn-success">
				<input type="button" value="Cancelar" class="btn btn-info">
				</a>
			
				</div>
			</div>
		</form>					
	</body>

</html>		