<?php
//alterar o método para post futuramente

$numero = $_GET["numero"];
$bloco = $_GET["bloco"];
$usuario = $_GET["usuario"];
$situacao = $_GET["situacao"];

$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
	echo "erro ao conectar na base de dados: " .
		mysqli_connect_errno();
}

$sql = "insert into imoveis (numero_imovel,id_bloco, id_usuario_fk, situacao )
	        values  ('$numero','$bloco','$usuario','$situacao')";
mysqli_query($con, $sql);
mysqli_close($con);

if (($sql)) {
	header("Location: consultaUsuarios.php");
};
