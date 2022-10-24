<?php
session_start();
$email = $_POST["email"];
$senha = $_POST["senha"];
$senha = md5($senha);

$con = mysqli_connect ( "localhost", "root","","tcc");

	if ((!$con)) {
		echo "erro ao conectar na base de dados: ". 
		mysqli_connect_errno();
	}
	
	$sql = "select * from usuarios where email_usuario = '$email' and senha = '$senha'";
	$verifica = mysqli_query($con,$sql);
		
	if (mysqli_num_rows ($verifica) == 1){
		$resultado_sessao = mysqli_fetch_assoc($verifica);
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		$_SESSION['nome_usuario'] = $resultado_sessao['nome_usuario'];
		$_SESSION['id_usuario'] = $resultado_sessao['id_usuario'];
		$_SESSION['tipo_usuario_fk'] = $resultado_sessao['tipo_usuario_fk'];
		
		if ( $_SESSION['tipo_usuario_fk'] < 3 ){
			header('location: /Aulasphp/TCC/MURAL/muralRecadosUser.php');
		} else header('location: /Aulasphp/TCC/HOME_CADASTROS/homeCadastros.php');
	} else{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		 

		$_SESSION['status'] = "Usuário ou senha incorretos";
		header("Location: pageLogin.php");
	}