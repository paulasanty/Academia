<?php
   include_once("../php/conexao.php");
   session_start();

   ?>
<?php 
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $querySelect   = mysqli_query($conexao, "DELETE  FROM tb_instrutor  where Id_instrutor = '$id'");
    $affected_rows = mysqli_affected_rows($conexao);
    
    if($affected_rows > 0){
        $_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Exclusão do cadastro realizado com sucesso!'."</p>";
        header("Location:../php/consultaInstrutor.php");
    }else{
        $_SESSION['msg'] = "<p style='color:Tomato;'>".'Cadastro do Instrutor não excluído!'."</p>";
        header("Location:../php/consultaInstrutor.php");
    }
?>