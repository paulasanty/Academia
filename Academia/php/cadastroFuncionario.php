<?php 
session_start();
include_once("../php/conexao.php");

if (!isset($_SESSION['login'])) {
    header("Location:../index.php?erro=1");
}
?>
<?php include_once '../includes/header.inc.php'?>
    <div class="wrapper">
<?php include_once '../includes/menu_ger.php' ?>
<h3 id="cabecalho">Cadastro de Funcionario</h3>
    <p></p><br>
<div class="row">
    <div class="col-sm-3"></div>
       <div class="col-md-4">
       <?php 
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            session_unset();
        }
        ?>
        <form method="post" action="../bd_php/cad_Funcionario.php">
                <fieldset class="col s12">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Fulano de Tal Caixinha de Fósforo">
                    </div>
                    <div class="form-group">
                        <label>Login:</label>
                        <input type="text" class="form-control" name="login" id="login">
                    </div>
                    <div class="form-group">
                        <label>Senha:</label>
                        <input type="password" class="form-control" name="senha" id="senha"><br>
                    </div>
                    <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <select id="cargo" name="cargo" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary">
                    <option value="Selecione">Selecione</option>
                    <?php
                    $resul = "SELECT * FROM tb_cargo";
                    $resuls = mysqli_query($conexao, $resul);
                    while ($rows_instrutor = mysqli_fetch_assoc($resuls)) {
                        ?>
                        <option value="<?php echo $rows_instrutor['Id_cargo']; ?>">
                        <?php
                        echo $rows_instrutor['descricao'];
                        ?>
                        </option><?php

                            }
                            ?>
                </select>
               </div>
                    <!-- BOTÕES DE VALIDAÇÃO -->
                        <!--<button class="btn blue lighten-2" type="submit">Logar</button>-->
                        <button class="btn btn-info pequeno" type="submit" value="Cadastrar" name="cadastrar" id="cadastrar"></a>Cadastrar</button></a>
                        <button type="reset" class="btn btn-danger pequeno">Cancelar</button>
                </fieldset>
            </form>
        </div>
</div>
<?php include_once '../includes/footer.inc.php' ?>