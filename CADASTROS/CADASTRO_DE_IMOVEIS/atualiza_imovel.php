<?php
$id_imovel = $_GET['id'];
$numero = $_GET["numero"];
$bloco = $_GET['bloco'];
$situacao = $_GET['situacao'];

echo $id_imovel;
	
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "UPDATE imoveis
            set numero_imovel = '$numero', id_bloco_fk = '$bloco', id_situacao_fk = '$situacao'
            where id_imovel = '$id_imovel'" ;

	 $resultado = mysqli_query($con,$sql);
	
	if ($resultado){
		header("Location: cadastroImovel.php");
	}

?>	