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
    <h3 id="cabecalho">Cadastro de Instrutores</h3>
        <p></p><br>
    <div class="col-sm-3"></div>
        <div class="col-sm-8">
        <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            session_unset();
            }
        ?>
        <form method="post" action="../bd_php/cad_instrutor.php">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome"  max="10" min="0" required>
            </div>
            <div class="form-group">
                <label for="cpfInstrutor">CPF</label>
                <input type="cpf" class="form-control" onchange="validaCPF()" name="cpfInstrutor" max="14" id="cpfInstrutor" required>
            </div>
            <div class="form-group">
                <label for="rgInstrutor">RG</label>
                <input type="text" class="form-control" name="rgInstrutor" id="rgInstrutor" max="15" required>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-9">
            <div class="form-group">
                <label for="aula">Aula</label>
                <select id="aula" name="aula" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary">
                <option value="Selecione">Selecione</option>
                    <?php
                        $resul = "SELECT * FROM tb_aula";
                        $resuls = mysqli_query($conexao, $resul);
                        while($rows_aula = mysqli_fetch_assoc($resuls))
                        {
                    ?>
                <option value="<?php echo $rows_aula['Id_aula']; ?>">
                        <?php
                            echo $rows_aula['descricao'];
                        ?>
                </option><?php
                        }
                    ?>
                </select>
            </div>
            
            </div>
            <div>
                <button type="submit" class="btn btn-info medio" value="Cadastrar" name="cadastrar" id="cadastrar" data-toggle="tooltip" data-placement="top" title="Cadastrar">Cadastrar</button>
                <button type="reset" class="btn btn-danger medio">Limpar</button>
            </div>
        </form>
    </div>
<?php include_once '../includes/footer.inc.php'?>