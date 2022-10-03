<?php
//alterar o método para post futuramente


$bloco = $_GET["bloco"];

	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "insert into blocos (bloco )
	        values  ('$bloco')";
				mysqli_query($con,$sql);
				mysqli_close($con);

				if (($sql))	{
					header('Location: cadastroBlocos.php');
	};
									



?>