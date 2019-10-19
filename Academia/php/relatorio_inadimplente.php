<?php 
    include_once("../php/conexao.php");

        session_start();
        if(!isset($_SESSION['login'])){
        header("Location:../index.php?erro=1");
        }
?>

<?php include_once '../includes/header.inc.php'?>
    <div class="wrapper">
    <?php include_once '../includes/menu_ger.php'  ?>
    <div class="row"></div>
        <div class="col-sm-12">
            <table class="table table-hover">
                <h3 id="cabecalho">Clientes Inadimplentes</h3>
                <p></p><br>
                <tr>
                    <th>Matricula</th>
                    <th>Cliente</th>
                    <th>Parcela</th>
                    <th>Valor</th>
                    <th>Vencimento</th>
                </tr>
                <tbody>
                <?php include_once '../bd_php/get_dividas.php'?>
                <div">
                    <ul class="list-unstyled CTAs">
                        <a href="../bd_php/download_inad.php" class="download">Download do Relatório</a>
                    </ul>
                </div>
                </tbody>
            </table>
        </div>
    </div>


<?php include_once '../includes/footer.inc.php'?>