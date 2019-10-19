<?php
	 session_start();
	 include_once("../php/conexao.php");

	$nome       = $_POST['nome'];
	$rg         = $_POST['rgInstrutor'];
	$cpf        = $_POST['cpfInstrutor'];
	$tipoAula   = $_POST['aula'];
	

	$querySelect = mysqli_query($conexao, "SELECT cpf FROM tb_instrutor WHERE cpf = '$cpf'");
	$array_cpf = [];
	
		while ($cliente = mysqli_fetch_assoc($querySelect)) {
			$func_exist = $cliente['cpf'];
			array_push($array_cpf, $func_exist);
		}
	 
		if(in_array($cpf, $array_cpf)){

			$_SESSION['msg'] = "<p style='color:Tomato;'>".'Esse CPF já está cadastrado!'."</p>";
			header("Location:../php/cadastroInstrutor.php");
	 
	 }else{
	
		$insert = mysqli_query($conexao,"INSERT INTO tb_instrutor (nome,rg,cpf, tp_aula) 
																			VALUES ('$nome','$rg','$cpf','$tipoAula')");

		$affected_rows = mysqli_affected_rows($conexao);
		
			if($affected_rows > 0){
				$_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Usuário cadastrado com sucesso!'."</p>";
				header("Location:../php/cadastroInstrutor.php");
			}else{
				$_SESSION['msg'] = "<p style='color:Tomato;'>".'Instrutor não foi cadastrado, preencha os campos obrigatórios!'."</p>";
			 header("Location:../php/cadastroInstrutor.php");
			}
		}
		mysqli_close($conexao)
	?>