<?php
$nome_local = $_GET["nome_local"];

$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "insert into locais (nome_local)
				values  ('$nome_local')";
				mysqli_query($con,$sql);
				mysqli_close($con);

				if (($sql))	{
					header("Location: cadastroLocais.php");
	};
						
?>