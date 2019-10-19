<?php
	
	include_once("../php/conexao.php");

	if(!isset($_SESSION['login'])){
	header("Location:../index.php?erro=1");
	}

	$querySelect   = mysqli_query($conexao, "SELECT f.matricula, c.nome, f.numParcela, f.valorParcela, DATE_FORMAT(f.vencimento, '%d/%m/%y') as vencimento
     FROM tb_financeiro f inner join tb_cliente c on c.matricula = f.matricula WHERE f.dt_pgto IS NULL");

	while($registros = mysqli_fetch_assoc($querySelect)){
        $id           = $registros['matricula'];
        $nome         = $registros['nome'];
		$parcela      = $registros['numParcela'];
		$valorParcela = $registros['valorParcela'];
		$vencimento   = $registros['vencimento'];

		echo "<tr>";
			echo "<td>$id</td><td>$nome</td><td>$parcela</td><td>$valorParcela</td><td>$vencimento</td>";
		echo '</tr>';
	}
?>