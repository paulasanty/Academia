<?php 
include_once("../php/conexao.php");
 
$cpf = $_POST['cpf'];
$entrar = MD5($_POST['entrar']);

if (isset($entrar)) { 
$verifica = mysqli_query("SELECT cpf FROM tb_clientes WHERE cpf = $cpf");
  if (mysqli_num_rows($verifica)<1){
		echo"<script language='javascript' type='text/javascript'>
		alert('Não existe cliente cadastrado com esse CPF');window.location
		.href='../php/cadastroCliente.php';</script>";
	die();
  }else{
	setcookie("cpf",$cpf);
	header("Location:../html/menu.html");
  }
}
 mysqli_close($conexao)
?>