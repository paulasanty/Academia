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
<?php 
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['id'] = $id;
    $querySelect   = mysqli_query($conexao, "SELECT * FROM tb_aula i inner join tb_instrutor a on a.Id_instrutor = i.nomeInstrutor where Id_aula = '$id'");

    while($registros = mysqli_fetch_assoc($querySelect)){
        $id = $registros['Id_aula'];
	    $nome = $registros['descricao'];
	    $instrutor = $registros['Id_instrutor'];
	    $inicio = $registros['hrInicio'];
        $termino = $registros['hrTermino'];
        $tipoAula = $registros['tipo_Aula'];
        $dias = $registros['dias'];
        $sala = $registros['sala'];
    }
?>
<div class="row"></div>
<h3 id="cabecalho">Cadastro de Aula</h3>
        <p></p><br>
    <div class="col-sm-3"></div>
    
    <div class="col-sm-8">
        <form method="post" action="../bd_php/update_aula.php">
            <div class="form-group">
                <label for="atividade">Nome Ativiadade</label>
                <input type="text" class="form-control" name="atividade" value="<?php echo $nome ?>" id="atividade" required>
            </div>
            <div class="form-group">
                <label for="instrutor">Nome Instrutor</label>
                <select id="instrutor" name="instrutor" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary">
                <?php
                    $resuls = mysqli_query($conexao,"SELECT * FROM tb_instrutor where Id_instrutor = $instrutor");
                    $rows_aula = mysqli_fetch_assoc($resuls);
                    if($rows_aula <> 0){
                     
                ?>
                    <option value="<?php echo $rows_aula['Id_instrutor']; ?>">
                            <?php
                                echo $rows_aula['nome'];
                            ?>
                    </option><?php
                            }else{
                        ?>
                    <option >Selecione</option>
                        <?php
                            $resuls = mysqli_query($conexao,"SELECT * FROM tb_instrutor");
                            while($rows_aula = mysqli_fetch_assoc($resuls))
                            {
                        ?>
                    <option value="<?php echo $rows_aula['Id_instrutor']; ?>">
                            <?php
                                echo $rows_aula['nome'];
                            ?>
                    </option><?php
                            }
                        }
                    ?>
            </select>
            </div>
            <div class="form-group">
                <label for="tpAula">Tipo de Aula</label>
                <select id="tpAula" name="tpAula" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary">
                <?php
                    $resuls = mysqli_query($conexao,"SELECT * FROM tb_tipoaula where Id_tp_aula = $tipoAula");
                    $rows_aula = mysqli_fetch_assoc($resuls);
                    if($rows_aula <> 0){
                     
                ?>
                    <option value="<?php echo $rows_aula['Id_aula']; ?>">
                            <?php
                                echo $rows_aula['descricao'];
                            ?>
                    </option><?php
                            }else{
                        ?>
                    <option >Selecione</option>
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
                }
                ?>
                </select>
                </div>
                <div class="col-md-3">
                    <label for="hrinicio">Horário Início</label>
                    <input  type="time" id="hrinicio" name="hrinicio" value="<?php echo $inicio ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="hrfim">Horário Término</label>
                    <input  type="time" id="hrfim" name="hrfim" value="<?php echo $termino ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="sala">Sala</label>
                    <input type="text" class="form-control" value="<?php echo $sala ?>" name="sala" id="sala" required>
                </div>
                <br><br><br><br>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="check_list[]" value="Segunda"> Segunda
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value="Terça"> Terça
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value="Quarta" > Quarta
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value="Quinta"> Quinta
                    </label>
                    <p></p>
                    <label>
                        <input type="checkbox" name="check_list[]" value="Sexta"> Sexta
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value="Sábado"> Sábado
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value="Domingo"> Domingo
                    </label>
                    <label>
                        <input type="checkbox" name="check_list[]" value="Feriado"> Feriado
                    </label>
                    </div>
                    <br>
            <button type="submit" class="btn btn-info medio" value="Cadastrar" name="cadastrar" id="cadastrar" data-toggle="tooltip" data-placement="top" title="Cadastrar">Cadastrar</button>
            <button type="reset" class="btn btn-danger medio">Limpar</button>
        </form>
    </div>
    <?php include_once '../includes/footer.inc.php'  ?>