<?php 
$id_recado = $_GET['id'];
$recado = $_GET['recado'];
$tipo_recado = $_GET['tipos'];
	
$con = mysqli_connect ( "localhost", "root","","tcc");

if ((!$con)) {
    echo "erro ao conectar na base de dados: ". 
    mysqli_connect_errno();
}

$sql = "UPDATE mural_de_recados 
        set descricao_recado = '$recado', tipo_recado_fk = '$tipo_recado'
        where id_recado = '$id_recado'" ;

 $resultado = mysqli_query($con,$sql);

if ($resultado){
    header("Location: muralRecados.php");
}

?>