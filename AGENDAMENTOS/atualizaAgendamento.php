<?php
$id_agendamento = $_GET['id'];
$local = $_GET["locais"];
$data = $_GET['data_agendamento'];
$usuario = $_GET['usuarios'];
$datasb = array_reverse(explode("/", $data));
$datasb = implode("-", $datasb);

	
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "UPDATE agendamentos 
            set id_local_fk = '$local', data_agendamento = '$datasb', id_usuario_fk = '$usuario' 
            where id_agendamento = '$id_agendamento'" ;

	 $resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: homeAgendamentos.php");
	}

?>	