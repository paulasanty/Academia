<?php 
session_start();
include_once("../php/conexao.php");

$login = $_POST['login'];
$senha = MD5($_POST['senha']);


$query = "SELECT login, nome, cargo FROM tb_usuario WHERE login = '$login' AND senha = '$senha'";

$resultado = mysqli_query($conexao, $query);
if ($resultado) {
	$dados_usuario = mysqli_fetch_array($resultado);

	if (isset($dados_usuario['login'])) {

		$_SESSION['login'] = $dados_usuario['login'];
		$_SESSION['nome'] = $dados_usuario['nome'];

		if ($dados_usuario['cargo'] <> 2) {
			header("Location:../php/menu.php");

		}else {
			header("Location:../php/menu2.php");
		}

	}else {
		header("Location:../index.php?erro=1");
	}

	var_dump($dados_usuario);
}
?>