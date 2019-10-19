<?php
session_start();
include_once("../php/conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$tipoAula = $_POST['aula'];
$dtinicio = $_POST['dtinicio'];
$dtfim = $_POST['dtfim'];
$valor = $_POST['valor'];
$tipoplano = $_POST["optionsPlano"];
$form_pgto = $_POST["options"];
$qtd = $_POST["qtd"];


$querySelect = mysqli_query($conexao, "SELECT cpf FROM tb_cliente WHERE cpf = '$cpf'");
$array_cpf = [];

while ($cliente = mysqli_fetch_assoc($querySelect)) {
	$func_exist = $cliente['cpf'];
	array_push($array_cpf, $func_exist);
}

if (in_array($cpf, $array_cpf)) {

	$_SESSION['msg'] = "<p style='color:Tomato;'>" . 'Esse CPF já está cadastrado!' . "</p>";
	header("Location:../php/cadastroCliente.php");

} else {

	$insert = mysqli_query($conexao, "INSERT INTO tb_cliente (nome,rg,cpf,email,	logradouro,bairro,cidade,estado, dat_ini_contr, dat_fim_contr, valor, form_pgto, tp_plano, tp_aula, qtd_parcelas) 
		VALUES ('$nome','$rg','$cpf','$email','$endereco','$bairro','$cidade', '$estado','$dtinicio','$dtfim', '$valor','$form_pgto', '$tipoplano','$tipoAula','$qtd')");

	$affected_rows = mysqli_affected_rows($conexao);

	if ($affected_rows > 0) {
		$_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>" . 'Cliente cadastrado com sucesso!!' . "</p>";
		header("Location:../php/cadastroCliente.php");
	} else {
		$_SESSION['msg'] = "<p style='color:Tomato;'>" . 'Cliente não foi cadastrado, preencha os campos obrigatórios!' . "</p>";
		header("Location:../php/cadastroCliente.php");
	}
}
mysqli_close($conexao)
?>
