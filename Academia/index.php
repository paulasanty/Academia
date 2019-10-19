<?php
    $erro = isset($_GET['erro'])? $_GET['erro']:0;
?>


<!DOCTYPE <!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
    <title>Maromba Fitness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/materialize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <script src="main.js"></script>
</head>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>
<div class="hero-image">
  </div>
</div>
<div>
    <div id="inner">
    <h3 class="title has-text-grey">Sistema de Academia</h3>
        <form inner method="post" id="frmlogin" action="php/login.php">

           <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" name="login" id="login" aria-describedby="login" max="30" placeholder="Digite seu login..">
            </div>
            <div class="form-group">
                <label for="senha">Password</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
           </div>
              <!-- BOTÕES DE VALIDAÇÃO -->
            <div class="row"></div>
            <div class="col-md-12">
                <button class="btn btn-primary pequeno" type="submit" value="logar" name="logar" id="logar">Logar</button>
                <a href="index.php" class="btn btn-danger pequeno">Cancelar</a><p></p>
            </div>
         </form>
         <div class="row"></div>
            <div class="col-md-12" id="alerta">
         <?php
         if ($erro == 1) {
              echo('<font color="#FF0000">  Usuário e ou senha inválido(s) </font>');
         }
         ?>
         </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#logar').click(function(){
            var campo_vazio = false;

            if($('#login').val() == ''){
                $('#login').css({'border':'2px solid red'});
                var campo_vazio = true;
                //alert('Preencha o campo Login!')
            } else{
                $('#login').css({'border':'2px solid gray'});
            }
            if($('#senha').val() == ''){
                $('#senha').css({'border':'2px solid red'});
                var campo_vazio = true;
                //alert ('Preencha o campo senha!')
            }else{
                $('#login').css({'border':'2px solid gray'});
            }
            if(campo_vazio) return false;
        });
    });
</script>
</body>
</html>
