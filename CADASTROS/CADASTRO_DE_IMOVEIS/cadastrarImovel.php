<?php
//alterar o método para post futuramente

$numero = $_GET["numero"];
$bloco = $_GET["bloco"];
$situacao = $_GET["situacao"];

$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
	echo "erro ao conectar na base de dados: " .
		mysqli_connect_errno();
}

$sql = "insert into imoveis (numero_imovel,id_bloco_fk, id_situacao_fk )
	        values  ('$numero','$bloco','$situacao')";
mysqli_query($con, $sql);
mysqli_close($con);

if (($sql)) {
	header("Location: cadastroImovel.php");
};
