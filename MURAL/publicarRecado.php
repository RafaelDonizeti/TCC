<?php 
 
 $recado = $_GET["recado"];
 $tipos =$_GET["tipos"];
 $con = mysqli_connect ( "localhost", "root","","tcc");
 
 if ((!$con)) {
    echo "erro ao conectar na base de dados: ". 
    mysqli_connect_errno();
}

$sql = "insert into mural_de_recados (descricao_recado, tipo_recado_fk)
        values('$recado','$tipos')";
        mysqli_query($con,$sql);
		mysqli_close($con);

				if (($sql))	{
					echo "Recado Publicado";
	};
									
  ?>