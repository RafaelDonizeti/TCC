<?php 
session_start();
if ((!isset($_SESSION['email']) == true) and  (!isset($_SESSION['senha']) == true)) {
  header('location: /Aulasphp/TCC/LOGIN/pageLogin.php');
}

 $con = mysqli_connect ( "localhost", "root","","tcc");
 $recado = $_GET["recado"];
 $tipos =$_GET["tipos"];
 $autor = $_SESSION['id_usuario'];
 
 if ((!$con)) {
    echo "erro ao conectar na base de dados: ". 
    mysqli_connect_errno();
}

$sql = "insert into mural_de_recados (descricao_recado, tipo_recado_fk,id_usuario_fk)
        values('$recado','$tipos','$autor')";
        mysqli_query($con,$sql);
		mysqli_close($con);

    if ( $_SESSION['tipo_usuario_fk'] < 3 ){
			header('location: /Aulasphp/TCC/MURAL/muralRecadosUser.php');
		} else header('location: /Aulasphp/TCC/MURAL/muralRecados.php');
	

									
  ?>