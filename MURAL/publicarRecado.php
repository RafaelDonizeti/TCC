<?php 
 $con = mysqli_connect ( "localhost", "root","","tcc");
 $recado = $_GET["recado"];
 $tipos =$_GET["tipos"];
 
 
 if ((!$con)) {
    echo "erro ao conectar na base de dados: ". 
    mysqli_connect_errno();
}

$sql = "insert into mural_de_recados (descricao_recado, tipo_recado_fk)
        values('$recado','$tipos')";
        mysqli_query($con,$sql);
		mysqli_close($con);

				if (($sql))	{
					header("Location: muralRecados.php");
	};
									
  ?>