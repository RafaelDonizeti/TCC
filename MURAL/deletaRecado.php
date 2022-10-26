<?php

	$id_recado = $_GET['id'];
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	 $sql = " DELETE from mural_de_recados
     where id_recado = '$id_recado' ";
	 $resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: muralRecados.php");
	}

?>	