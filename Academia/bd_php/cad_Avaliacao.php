<?php
session_start();
include_once("../php/conexao.php");

$nome = $_POST['fisio'];
$matricula = $_POST['matricula'];
$dtavali = $_POST['dtavali'];
$pamedia = $_POST['pamedia'];
$iliaca = $_POST['iliaca'];
$abdominal = $_POST['abdominal'];
$axilar = $_POST['axilar'];
$biceps = $_POST['biceps'];
$peitoral = $_POST['peitoral'];
$subescapular = $_POST['subescapular'];
$estagio = $_POST['estagio'];
$tempo = $_POST['tempo'];
$fc = $_POST["fc"];
$produto = $_POST["produto"];
$pd = $_POST["pd"];
$ps = $_POST["ps"];
$mv = $_POST["mv"];
$triceps = $_POST["triceps"];
$anamnese = $_POST["anamnese"];

$querySelect = mysqli_query($conexao, "SELECT dat_avaliacao FROM tb_avaliacao WHERE dat_avaliacao = '$dtavali' and matricula = $matricula ");
$array_agen = [];

while ($data = mysqli_fetch_assoc($querySelect)) {
	$agenda_exist = $data['dat_avaliacao'];
	array_push($array_agen, $agenda_exist);
}

if (in_array($dtavali, $array_agen)) {

	$_SESSION['msg'] = "<p style='color:Tomato;'>" . 'Essa data de agendamento para essa matricula já está cadastrado!' . "</p>";
	header("Location:../php/cadastroAvaliacao.php");

} else {

	$insert = mysqli_query($conexao, "INSERT INTO tb_avaliacao(nome_fisio, matricula, dat_avaliacao, pamedia, iliaca, abdominal, axilar, biceps,peitoral, subescapular, estagio, tempo, fc, produto, pd, ps, mv, triceps, anamnese) 
									  VALUES ('$nome','$matricula','$dtavali','$pamedia','$iliaca','$abdominal','$axilar', '$biceps','$peitoral','$subescapular', '$estagio','$tempo','$fc', '$produto','$pd','$ps', '$mv','$triceps','$anamnese')");

	$affected_rows = mysqli_affected_rows($conexao);

	if ($affected_rows > 0) {
		$_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>" . 'Cliente cadastrado com sucesso!!' . "</p>";
		header("Location:../php/cadastroAvaliacao.php");
	} else {
		$_SESSION['msg'] = "<p style='color:Tomato;'>" . 'Cliente não foi cadastrado, preencha os campos obrigatórios!' . "</p>";
		header("Location:../php/cadastroAvaliacao.php");
	}
}
mysqli_close($conexao)
?>
