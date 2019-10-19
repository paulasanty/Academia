<?php
   include_once("../php/conexao.php");
   session_start();

   ?>
<?php 
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $querySelect   = mysqli_query($conexao, "DELETE  FROM tb_cliente  where matricula = '$id'");
    $affected_rows = mysqli_affected_rows($conexao);
    
    if($affected_rows > 0){
        $_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Exclusão do cadastro efetuado com sucesso de sucesso!'."</p>";
        header("Location:../php/consultaCliente.php");
    }else{
        $_SESSION['msg'] = "<p style='color:Tomato;'>".'Não foi possível excluir o cadastro do cliente, existe férias vinculado a esse cadastrado!'."</p>";
     header("Location:../php/consultaCliente.php");
    }
?>