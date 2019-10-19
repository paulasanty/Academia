<?php
   session_start();
   include_once("../php/conexao.php");
   
   $nome       = $_POST['atividade'];
   $instrutor  = $_POST['instrutor'];
   $hrinicio   = $_POST['hrinicio'];
   $hrfim      = $_POST['hrfim'];
   $tpaula     = $_POST['tpAula'];
   $sala     = $_POST['sala'];
	
  if(!empty($_POST['check_list'])) { 
 
    foreach($_POST['check_list'] as $selected) {
    $results .=  $selected;	
    $results .= ' / ';
    }
    $insert = mysqli_query($conexao,"INSERT INTO tb_aula (descricao, nomeInstrutor, hrInicio, hrTermino, dias, tipo_aula, sala) 
    VALUES ('$nome','$instrutor','$hrinicio','$hrfim','$results', '$tpaula','$sala')");
    
    $affected_rows = mysqli_affected_rows($conexao);
  }
if($affected_rows > 0){
    $_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Aula cadastrada com sucesso!'."</p>";
    header("Location:../php/cadastroAula.php");

	}else{
	  $_SESSION['msg'] = "<p style='color:Tomato;'>".'Aula não foi cadastrada, preencha os campos obrigatórios!'."</p>";
	 header("Location:../php/cadastroAula.php");
	}

  mysqli_close($conexao)
?>

