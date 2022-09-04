<?php

$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}

	$resultado = array(); // Cria um array para receber o resultado
	$query = "select id_usuario, nome_usuario, telefone_usuario, email_usuario, tipo_usuario, imovel_usuario, bloco_usuario from usuarios "; // Expressão SQL que irá ser executada
	$result = mysqli_query($con,$query); // Executa a consulta com base na query
    $resultado = $result->fetch_all(MYSQLI_ASSOC); // Faz uma associação
						
?>


<!DOCTYPE html>
<html lang = "pt">
	<head>
		<meta charset ="utf-8"/>
		<title> Consulta de Usuários </title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
	</head>

	<body>
		<div class = "container mt-5" >
			<div class ="table-responsive">
				<table class = "table table-bordered ">
						
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Email</th>
						<th>Tipo</th>
						<th>Imóvel</th>
						<th>Bloco</th>
                        <th colspan="3 ">Ações</th>
						
					</tr>
							
							<?php foreach ($resultado as $row)  { ?>
							<tr>
								<td><?php echo $row['id_usuario']; ?> </td> 
								<td><?php echo $row['nome_usuario']; ?> </td> 
								<td><?php echo $row['telefone_usuario']; ?></td>
								<td><?php echo $row['email_usuario']; ?></td>
                                <td><?php echo $row['tipo_usuario']; ?></td>
								<td><?php echo $row['imovel_usuario']; ?></td>
								<td><?php echo $row['bloco_usuario']; ?></td>
								<td ><a href = "editaUsuario.php?id=<?php echo $row['id_usuario']; ?>"> Editar </a> </td>
								<td ><a href = "javascript:if(confirm('Deseja excluir esse registro?')) {location='deletaUsuario.php?id=<?php echo $row['id_usuario']; ?>';}" > Deletar </a> </td>
							</tr>
							
							
					<?php 	} ?>
						
				</table>	
				
					<a 
				href=""><br>
				<input type="button" value="botao para cadastrar novo usuario ">
				</a>
				
			</div>
		</div>
		
	</body>

</html>		
