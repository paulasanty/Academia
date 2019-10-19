<?php 
    include_once("../php/conexao.php");

    session_start();
    $id = $_SESSION['id'];
    //if(!isset($_SESSION['login'])){
    //header("Location:../index.php?erro=1");
    //}

    $nome       = $_POST['nome'];
    $rg         = $_POST['rgInstrutor'];
    $cpf        = $_POST['cpfInstrutor'];
    $tipoAula   = $_POST['aula'];

    $queryUpdate   = mysqli_query($conexao, "UPDATE tb_instrutor SET nome='$nome', rg='$rg', 
                                 cpf='$cpf', tp_aula='$tipoAula' where Id_instrutor = '$id'");

    $affected_rows = mysqli_affected_rows($conexao);

    if($affected_rows > 0){
        $_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Cadastro do Instrutor atualizado com sucesso!'."</p>";
        header("Location:../php/consultaInstrutor.php");
    }else{
        $_SESSION['msg'] = "<p style='color:Tomato;'>".'Cadastro do Instrutor não foi atualizado, preencha os campos obrigatórios!'."</p>";
        header("Location:../php/consultaInstrutor.php");
    }
?>