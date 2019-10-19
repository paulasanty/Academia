<?php 
    session_start();
    include_once("../php/conexao.php");

        
    if(!isset($_SESSION['login'])){
    header("Location:../index.php?erro=1");
    }
?>

<?php include_once '../includes/header.inc.php'?>
    <div class="wrapper">
<?php include_once '../includes/menu.inc.php'?>
    <div class="row"></div>
    <h3 id="cabecalho">Lista de Aulas</h3>
        <p></p><br>
        <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            session_unset();
            }
        ?>
        <div class="col-sm-12">
            <table class="table table-hover">
                <tr>
                    <th>Aula</th>
                    <th>Instrutor</th>
                    <th>Início</th>
                    <th>Termino</th>
                    <th>Dias de Aula</th>
                    <th>Sala</th>
                    <th>Ações</th>
                    <th></th>
                </tr>
                <tbody>
                <?php include_once '../bd_php/get_aula.php'?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once '../includes/footer.inc.php'?>