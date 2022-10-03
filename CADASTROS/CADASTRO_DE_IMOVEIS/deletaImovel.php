<?php

	$id_imovel = $_GET['id'];
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = " delete from imoveis where id_imovel = '$id_imovel' ";
	$resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: cadastroImovel.php");
	}

?>	