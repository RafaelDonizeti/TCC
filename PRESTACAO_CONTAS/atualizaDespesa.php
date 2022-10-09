<?php
$id_despesa = $_GET['id'];
$despesa = $_GET["despesa"];
$conta = $_GET['conta'];
$valor_despesa = $_GET["valor"];
$data_despesa = date($_GET["data"]);
$valorsv = explode(",",$valor_despesa);
$valorsv = implode(".",$valorsv);
$datasb = array_reverse(explode("/", $data_despesa));
$datasb = implode("-", $datasb);

	
	$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "UPDATE despesas
            set despesa = '$despesa', valor_despesa = '$valorsv', data_despesa = '$datasb', id_conta_fk ='$conta' 
            where id_despesa = '$id_despesa'" ;

	 $resultado = mysqli_query($con,$sql);
	
	if ($resultado){
    
		header("Location: cadastroDespesa.php");
	}

?>	