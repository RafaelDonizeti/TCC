<?php
//alterar o método para post futuramente
$nome = $_GET["nome"];
$telefone = $_GET["telefone"];
$email = $_GET["email"];
$tipo = $_GET["tipo"];
$senha = $_GET["senha"];
$imovel = $_GET["imovel"];


	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "insert into usuarios (nome_usuario, telefone_usuario, email_usuario, tipo_usuario_fk, senha, imovel_usuario)
				values  ('$nome','$telefone','$email','$tipo','$senha','$imovel')";
				mysqli_query($con,$sql);
				mysqli_close($con);

				if (($sql))	{
					header("Location: consultaUsuarios.php");
	};
									



?>