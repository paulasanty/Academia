<?php 
	 session_start();
   include_once("../php/conexao.php");

$nome  = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$cargo = $_POST['cargo'];

$querySelect = mysqli_query($conexao, "SELECT login FROM tb_usuario WHERE login = '$login'");
$array_login = [];

  while ($user = mysqli_fetch_assoc($querySelect)) {
    $func_exist = $user['login'];
    array_push($array_login, $func_exist);
  }
 
  if(in_array($login, $array_login)){
	
    $_SESSION['msg'] = "<p style='color:Tomato;'>".'Esse Login já está cadastrado!'."</p>";
    header("Location:../php/cadastroInstrutor.php");
 
  }else{

  $insert = mysqli_query($conexao,"INSERT INTO tb_usuario (nome, login, senha, cargo) 
                                    VALUES ('$nome','$login','$senha','$cargo')");

  $affected_rows = mysqli_affected_rows($conexao);

    if($affected_rows > 0){

      $_SESSION['msg'] = "<p style='color:MediumSeaGreen;'>".'Usuário cadastrado com sucesso!'."</p>";
      header("Location:../php/cadastroFuncionario.php");

    }else{
      $_SESSION['msg'] = "<p style='color:Tomato;'>".'Usuário não foi cadastrado, preencha os campos obrigatórios!'."</p>";
     header("Location:../php/cadastroFuncionario.php");
    }
  }
  mysqli_close($conexao)
?>