<?php

$usuario = $_GET["usuario"];
$senha = $_GET["senha"];


$con = mysqli_connect ( "localhost", "root","","loja_de_veiculos");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "select * from clientes where usuario = '$usuario' and senha = '$senha'";
	$verifica = mysqli_query($con,$sql);
		
	if (mysqli_num_rows ($verifica)<= 0){
		echo "Usuario ou senha incorretos ";
	} else{
		
		header("Location: consultacarros.html");
	}

?>