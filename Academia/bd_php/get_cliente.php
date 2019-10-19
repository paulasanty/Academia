<?php
	
	include_once("../php/conexao.php");

	//if(!isset($_SESSION['login'])){
	//header("Location:../index.php?erro=1");
	//}

	$querySelect   = mysqli_query($conexao, "SELECT * FROM tb_cliente");

	while($registros = mysqli_fetch_assoc($querySelect)){
		$id = $registros['matricula'];
		$nome = $registros['nome'];
		$cpf = $registros['cpf'];
		$rg = $registros['rg'];
		$email = $registros['email'];

		echo "<tr>";
			echo "<td>$id</td><td>$nome</td><td>$cpf</td><td>$rg</td><td>$email</td>
			<td><a href='../php/editar_cliente.php?id=$id'><span class='glyphicon glyphicon-pencil data-toggle='tooltip' data-placement='top' 
			title='Editar''></span></a></td>
			<td><a href='../bd_php/delete_cliente.php?id=$id'><span class='glyphicon glyphicon-trash data-toggle='tooltip' data-placement='top' 
			title='Excluir'></span></a></td>";
		echo '</tr>';
	}
?>