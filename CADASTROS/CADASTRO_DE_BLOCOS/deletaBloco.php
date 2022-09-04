<?php

	$id_bloco = $_GET['id'];
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = " delete from blocos where id_bloco = '$id_bloco' ";
	$resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: cadastroBlocos.php");
	}

?>	