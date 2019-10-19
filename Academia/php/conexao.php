<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "db_academia";
    $conexao = mysqli_connect($hostname,$user,$password,$database);

    if(!$conexao){
        print "Falha conexão com o Banco de Dados";
    }
?>