<?php
$id_usuario = $_GET['id'];
$nome = $_GET["nome"];
$telefone = $_GET["telefone"];
$email = $_GET["email"];
$tipo = $_GET["tipo"];
$imovel = $_GET["imovel"];

	
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "update usuarios set nome_usuario = '$nome', telefone_usuario = '$telefone', email_usuario = '$email', tipo_usuario = '$tipo', imovel_usuario ='$imovel' where id_usuario = '$id_usuario'" ;
	$resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: consultaUsuarios.php");
	}

?>	