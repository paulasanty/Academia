<?php 
    include_once("../php/conexao.php");

    session_start();
    $id = $_SESSION['id'];
    //if(!isset($_SESSION['login'])){
    //header("Location:../index.php?erro=1");
    //}

	    $nome       = $_POST['atividade'];
	    $instrutor  = $_POST['instrutor'];
	    $inicio     = $_POST['hrinicio'];
        $termino    = $_POST['hrfim'];
        $tipoAula   = $_POST['tpAula'];
        $sala   = $_POST['sala'];

        if(!empty($_POST['check_list'])) { 
 
            foreach($_POST['check_list'] as $selected) {
            $dias .= $selected;	
            $dias .= ' / ';
            }
    $queryUpdate   = mysqli_query($conexao, "UPDATE tb_aula SET descricao='$nome', nomeInstrutor='$instrutor', 
                                 hrInicio='$inicio', hrTermino='$termino',tipo_Aula='$tipoAula', dias='$dias', sala ='$sala' where Id_aula = '$id'");
    $affected_rows = mysqli_affected_rows($conexao);
    }
    if($affected_rows > 0){
        $_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Aula atualizado com sucesso!'."</p>";
        header("Location:../php/consultaAula.php");
    
    }else{
          $_SESSION['msg'] = "<p style='color:Tomato;'>".'Aula não foi atualizada, preencha os campos obrigatórios!'."</p>";
         header("Location:../php/consultaAula.php");
    }
?>