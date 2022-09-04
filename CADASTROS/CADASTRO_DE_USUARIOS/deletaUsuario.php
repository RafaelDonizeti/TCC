<?php

	$id_usuario = $_GET['id'];
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = " delete from usuarios where id_usuario = '$id_usuario' ";
	$resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: consultaUsuarios.php");
	}

?>	