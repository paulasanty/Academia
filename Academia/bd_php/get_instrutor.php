<?php
	
	include_once("../php/conexao.php");

	//if(!isset($_SESSION['login'])){
	//header("Location:../index.php?erro=1");
	//}

	$querySelect   = mysqli_query($conexao, "SELECT * FROM tb_instrutor i inner join tb_aula a on a.id_aula = i.tp_aula");


	while($registros = mysqli_fetch_assoc($querySelect)){
		$id 	  = $registros['Id_instrutor'];
		$nome 	  = $registros['nome'];
		$cpf 	  = $registros['cpf'];
		$rg 	  = $registros['rg'];
		$tipoAula = $registros['descricao'];

		echo "<tr>";
			echo "<td>$nome</td><td>$cpf</td><td>$rg</td><td>$tipoAula</td>
			<td><a href='../php/editar_instrutor.php?id=$id'><span class='glyphicon glyphicon-pencil data-toggle='tooltip' data-placement='top' 
			title='Editar''></span></a></td>
			<td><a href='../bd_php/delete_instrutor.php?id=$id'><span class='glyphicon glyphicon-trash data-toggle='tooltip' data-placement='top' 
			title='Excluir'></span></a></td>";
		echo '</tr>';
	}
?>