<?php 
    include_once("../php/conexao.php");

    session_start();
    if(!isset($_SESSION['login'])){
    header("Location:../index.php?erro=1");
    }
?>

<?php include_once '../includes/header.inc.php'  ?>
    <div class="wrapper">
<?php include_once '../includes/menu.inc.php'  ?>
<h3 id="cabecalho">Registro de férias</h3>
        <p></p><br>
        <form method="post" action="../bd_php/cad_ferias.php">
            <div class="col-md-4">  
            
               <div class="col-md-6"> 
               
                   <label for="rg">Matricula</label>
                   <input type="text" class="form-control" name="matricula" id="matricula" required>
               </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-8">
                   <label for="dtinicio"> Período de férias</label>
                   <input type="date" class="form-control" name="dtinicio" id="dtinicio">
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">
                   <label for="numero">Qtd dias</label>
                   <input type="number" class="form-control" name="qtdDias" id="qtdDias" max="30" min="0" require>
                   <br><br><br>
                </div>
            </div>
            <div class="row"></div>
            <div class="col-md-12">
            <?php 
                    if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    session_unset();
                    }
                ?> 
                </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-info medio">Cadastrar</button>
                <button type="reset" class="btn btn-danger medio">Limpar</button>
            </div>
        </form>
        <div class="row"></div>
        <div class="col-sm-3"></div>
    </div>
<?php include_once '../includes/footer.inc.php'?>