<?php
//alterar o método para post futuramente


$despesa = $_GET["despesa"];
$valor_despesa = $_GET["valor"];
$data_despesa = date($_GET["data"]);
$valorsv = explode(",",$valor_despesa);
$valorsv = implode(".",$valorsv);

	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "insert despesas (despesa,valor_despesa,data_despesa )
	        values  ('$despesa','$valorsv','$data_despesa')";
				mysqli_query($con,$sql);
				mysqli_close($con);

				if (($sql))	{
                   
					header('Location: cadastroDespesa.php');
	};
									



?>