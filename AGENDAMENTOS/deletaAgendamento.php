<?php

	$id_agendamento = $_GET['id'];
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = " delete from agendamentos where id_agendamento = '$id_agendamento' ";
	$resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: homeAgendamentos.php");
	}

?>	