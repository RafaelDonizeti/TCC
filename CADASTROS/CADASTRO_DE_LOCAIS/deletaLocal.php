<?php

	$id_local = $_GET['id'];
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = " delete from locais where id_local = '$id_local' ";
	$resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: cadastroLocais.php");
	}

?>	