<?php 
    include_once("../php/conexao.php");

        session_start();
        if(!isset($_SESSION['login'])){
        header("Location:../index.php?erro=1");
        }
?>
<?php include_once '../includes/header.inc.php'?>
    <div class="wrapper">
<?php include_once '../includes/menu.inc.php'?>
<h3 id="cabecalho">Cadastro de Instrutores</h3>
        <p></p><br>
    <?php 
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['id'] = $id;
        $querySelect   = mysqli_query($conexao, "SELECT * FROM tb_instrutor i inner join tb_aula a on a.id_aula = i.tp_aula where Id_instrutor = '$id'");

        while($registros = mysqli_fetch_assoc($querySelect)){
            $id = $registros['Id_instrutor'];
            $nome = $registros['nome'];
            $cpf = $registros['cpf'];
            $rg = $registros['rg'];
        }
    ?>
    <!-- Formulario de Edição-->
    
    <div class="row"></div>
    <div class="col-sm-3"></div>
    <div class="col-sm-8">
    <form method="post" action="../bd_php/update_instrutor.php">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>" id="nome" required>
            </div>
            <div class="form-group">
                <label for="cpfInstrutor">CPF</label>
                <input type="cpf" class="form-control" name="cpfInstrutor" value="<?php echo $cpf ?>" id="cpfInstrutor" required>
            </div>
            <div class="form-group">
                <label for="rgInstrutor">RG</label>
                <input type="text" class="form-control" name="rgInstrutor" value="<?php echo $rg ?>" id="rgInstrutor" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="form-group">
                <label for="aula">Aula</label>
                <select id="aula" name="aula" value="<?php echo $tipoAula ?>" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary">
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
            <div>
                <button type="submit" class="btn btn-info medio" value="alterar" name="alterar" id="alterar" data-toggle="tooltip" data-placement="top" title="Alterar">Alterar</button>
                <a href="../php/consultaInstrutor.php" class="btn btn-danger medio">Cancelar</a>
            </div>
        </form>
    </div>
<?php include_once '../includes/footer.inc.php'?>