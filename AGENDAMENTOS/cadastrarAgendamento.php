<?php
//alterar o método para post futuramente
// falta inserir data no banco
$con = mysqli_connect ( "localhost", "root","","tcc");

$local = $_GET["locais"];
$data = $_GET["data_agendamento"];
$datasb = array_reverse(explode("/", $data));
$datasb = implode("-", $datasb);



	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "insert into agendamentos (id_local_fk, data_agendamento )
	        values  ('$local','$datasb')";
				mysqli_query($con,$sql);
				mysqli_close($con);

				if (($sql))	{
					header("Location: homeAgendamentos.php");
	};
									



?>