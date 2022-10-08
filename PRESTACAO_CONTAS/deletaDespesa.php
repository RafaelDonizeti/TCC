<?php

	$id_despesa = $_GET['id'];
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = " delete from despesas where id_despesa = '$id_despesa' ";
	$resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: cadastroDespesa.php");
	}

?>	