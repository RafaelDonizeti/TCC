<?php
session_start();
//alterar o método para post futuramente
$nome = $_GET["nome"];
$telefone = $_GET["telefone"];
$email = $_GET["email"];
$tipo = $_GET["tipo"];
$senha = md5($_GET["senha"]);
$imovel = $_GET["imovel"];


$con = mysqli_connect("localhost", "root", "", "tcc");

if ((!$con)) {
	echo "erro ao conectar na base de dados: " .
		mysqli_connect_errno();
}

$search = "SELECT * from usuarios where email_usuario = '$email'";
$verificaemail = mysqli_query($con, $search);

$searchinquilino = "SELECT tipo_usuario_fk,id_imovel_fk 
from usuarios 
where tipo_usuario_fk = '$tipo' and id_imovel_fk = '$imovel'";
$verificainquilino = mysqli_query($con, $searchinquilino);

if (mysqli_num_rows($verificainquilino) > 0){
	$_SESSION['statusem'] = "esse imóvel já possui inquilino";
	header("Location: cadastroUsuario.php");


if (mysqli_num_rows($verificaemail) > 0) {
	$_SESSION['statusem'] = "Esse email ja está em uso";
	header("Location: cadastroUsuario.php");
}} else {

	$sql = "INSERT into usuarios (nome_usuario, telefone_usuario, email_usuario, tipo_usuario_fk, senha, id_imovel_fk)
		    values  ('$nome','$telefone','$email','$tipo','$senha','$imovel')";
}
mysqli_query($con, $sql);
mysqli_close($con);


if (($sql)) {
	$_SESSION['status'] = "Usuário Cadastrado com Sucesso";
	header("Location: cadastroUsuario.php");
};
