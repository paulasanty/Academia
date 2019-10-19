<?php 
    include_once("../php/conexao.php");

    session_start();
    $id = $_SESSION['id'];
    //if(!isset($_SESSION['login'])){
    //header("Location:../index.php?erro=1");
    //}

    $nome       = $_POST['nome'];
    $cpf        = $_POST['cpf'];
    $rg         = $_POST['rg'];
    $email      = $_POST['email'];
    $logradouro = $_POST['endereco'];
    $bairro     = $_POST['bairro'];
    $cidade     = $_POST['cidade'];
    $estado     = $_POST['estado'];
    //$formpgto = $_POST['options'];
    //$plano = $_POST['optionsPlano'];
    $aula = $_POST['aula'];

    $queryUpdate = mysqli_query($conexao, "UPDATE tb_cliente SET nome='$nome', rg='$rg', email='$email', 
                                logradouro='$logradouro', bairro='$bairro', cidade='$cidade', estado='$estado',
                                 tp_aula='$aula'
                                where matricula = '$id'");
    $affected_rows = mysqli_affected_rows($conexao);

    if($affected_rows > 0){
        $_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Dados do cliente atualizado com sucesso!!'."</p>";
        header("Location:../php/consultaCliente.php");
    }else{
        $_SESSION['msg'] = "<p style='color:Tomato;'>".'Cadastro do cliente não foi atualizado, preencha os campos obrigatórios!'."</p>";
     header("Location:../php/consultaCliente.php");
    }
?>