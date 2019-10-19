<?php 
 session_start();
  include_once("../php/conexao.php");

$matricula  = $_POST['matricula'];
$dtinicio   = $_POST['dtinicio'];
$qtdDias    = ($_POST['qtdDias']);

$resultSelect = mysqli_query($conexao, "SELECT c.matricula FROM tb_cliente c 
											where c.tp_plano = 1 
											and  c.matricula = '$matricula'");
$array_ferias = [];

while ($cliente = mysqli_fetch_assoc($resultSelect)) {
	$func_exist = $cliente['matricula'];
	array_push($array_ferias, $func_exist);
}

if (in_array($matricula, $array_ferias)) {

$querySelect = mysqli_query($conexao, "SELECT sum(qtd_dias) as qtd FROM tb_ferias WHERE matricula = '$matricula' group by matricula ");

$row = mysqli_fetch_assoc($querySelect);
$soma = $row['qtd'] + $qtdDias;
 
	if($soma > '30'){

	  $_SESSION['msg'] = "<p style='color:Tomato;'>".'Limite de férias anula atigida, aguarde para marcar novas férias'."</p>";
		header("Location:../php/cadastroFerias.php");
	 
	 }else{
	
		$insert = mysqli_query($conexao,"INSERT INTO tb_ferias (matricula, periodo, qtd_dias) 
                                    VALUES ('$matricula','$dtinicio','$qtdDias')");

		$affected_rows = mysqli_affected_rows($conexao);
		
			if($affected_rows > 0){
				$_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Férias agendada com sucesso!'."</p>";
				header("Location:../php/cadastroFerias.php");
			}else{
				$_SESSION['msg'] = "<p style='color:Tomato;'>".'Férias não foi cadastrada, preencha os campos obrigatórios!'."</p>";
			 header("Location:../php/cadastroFerias.php");
			}
		}
}else{
		$_SESSION['msg'] = "<p style='color:Tomato;'>".'Férias não foi cadastrada, cliente tem plano mensal!'."</p>";
			 header("Location:../php/cadastroFerias.php");
			}
		mysqli_close($conexao)
	?>