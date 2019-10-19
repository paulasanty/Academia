<?php
	
	include_once("../php/conexao.php");

	if(!isset($_SESSION['login'])){
	header("Location:../index.php?erro=1");
	}

	$querySelect = mysqli_query($conexao, "SELECT c.matricula, c.nome, c.cpf, c.rg, c.email
                            FROM tb_cliente c");

	while($registros = mysqli_fetch_assoc($querySelect)){
        $id           = $registros['matricula'];
        $nome         = $registros['nome'];
		$cpf      = $registros['cpf'];
		$rg = $registros['rg'];
        $email   = $registros['email'];


		echo "<tr>";
			echo "<td>$id</td><td>$nome</td><td>$cpf</td><td>$rg</td><td>$email</td>";
		echo '</tr>';
	}
?>