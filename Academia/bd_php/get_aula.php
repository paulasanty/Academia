<?php

	include_once("../php/conexao.php");
	
	//if(!isset($_SESSION['login'])){
	//header("Location:../index.php?erro=1");
	//}

	$querySelect   = mysqli_query($conexao, "SELECT * FROM tb_aula a inner join tb_instrutor i on i.Id_instrutor = a.nomeInstrutor");

	while($registros = mysqli_fetch_assoc($querySelect)){
		$id 		= $registros['Id_aula'];
		$nome		= $registros['descricao'];
		$instrutor 	= $registros['nome'];
		$inicio 	= $registros['hrInicio'];
        $termino 	= $registros['hrTermino'];
		$dias 		= $registros['dias'];
		$sala 		= $registros['sala'];

		echo "<tr>";
			echo "<td>$nome</td><td>$instrutor</td><td>$inicio</td><td>$termino</td><td>$dias</td><td>$sala</td>
			<td><a href='../php/editar_aula.php?id=$id'><span class='glyphicon glyphicon-pencil data-toggle='tooltip' data-placement='top' 
			title='Editar''></span></a></td>
			<td><a href='../bd_php/delete_aula.php?id=$id'><span class='glyphicon glyphicon-trash data-toggle='tooltip' data-placement='top' 
			title='Excluir'></span></a></td>";
		echo '</tr>';
	}
?>