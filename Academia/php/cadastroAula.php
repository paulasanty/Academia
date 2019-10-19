<?php 
    session_start();
    include_once("../php/conexao.php");

    if(!isset($_SESSION['login'])){
    header("Location:../index.php?erro=1");
    }
?>
<?php include_once '../includes/header.inc.php'  ?>
    <div class="wrapper">
<?php include_once '../includes/menu.inc.php'  ?>
    <div class="row"></div>
    <h3 id="cabecalho">Cadastro de Aula</h3>
        <p></p><br>
    <div class="col-sm-3"></div>
    <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            session_unset();
            }
        ?>
    <div class="col-sm-8">
    
        <form method="post" action="../bd_php/cad_aula.php">
            <div class="form-group">
                <label for="atividade">Descrição</label>
                <input type="text" class="form-control" name="atividade" id="atividade" required>
            </div>
            <div class="form-group">
                <label for="instrutor">Instrutor</label>
                <select id="instrutor" name="instrutor" class="form-control form-control-md colorful-select dropdown-primary">
                <option value="Selecione">Selecione</option>
                <?php
                    $resul = "SELECT * FROM tb_instrutor";
                    $resuls = mysqli_query($conexao, $resul);
                    while($rows_instrutor = mysqli_fetch_assoc($resuls))
                    {
                ?>
                    <option value="<?php echo $rows_instrutor['Id_instrutor']; ?>">
                    <?php
                        echo $rows_instrutor['nome'];
                    ?>
                    </option><?php
                    }
                ?>
            </select>
            </div>
            <div class="form-group">
                <label for="tpAula">Tipo de Aula</label>
                <select id="tpAula" name="tpAula" class="form-control form-control-md colorful-select dropdown-primary">
                <option value="Selecione">Selecione</option>
                <?php
                    $resul = "SELECT * FROM tb_tipoaula";
                    $resuls = mysqli_query($conexao, $resul);
                    while($rows_instrutor = mysqli_fetch_assoc($resuls))
                    {
                ?>
                    <option value="<?php echo $rows_instrutor['Id_tp_aula']; ?>">
                    <?php
                        echo $rows_instrutor['descricao'];
                    ?>
                    </option><?php
                    }
                ?>
                </select>
                </div>
                <div class="col-md-3">
                    <label for="hrinicio">Horário Início</label>
                    <input  type="time" id="hrinicio" name="hrinicio" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="hrfim">Horário Término</label>
                    <input  type="time" id="hrfim" name="hrfim" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="sala">Sala</label>
                    <input type="text" class="form-control" name="sala" id="sala" required>
                </div>
                <br><br><br><br>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="check_list[]" value='Segunda'> Segunda
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value='Terça'> Terça
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value='Quarta' > Quarta
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value='Quinta'> Quinta
                    </label>
                    <p></p>
                    <label>
                        <input type="checkbox" name="check_list[]" value='Sexta'> Sexta
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value='Sábado'> Sábado
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value='Domingo'> Domingo
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value='Feriado'> Feriado
                    </label>
                    </div>
                    <br>
            <button type="submit" class="btn btn-info medio" value="Cadastrar" name="cadastrar" id="cadastrar" data-toggle="tooltip" data-placement="top" title="Cadastrar">Cadastrar</button>
            <button type="reset" class="btn btn-danger medio">Limpar</button>
        </form>
    </div>
<?php include_once '../includes/footer.inc.php'  ?>