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
<h3 id="cabecalho">Cadastro de Cliente</h3>
        <p></p><br>
    <?php 
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['id'] = $id;
        $querySelect   = mysqli_query($conexao, "SELECT * FROM tb_cliente  where matricula = '$id'");

        while($registros = mysqli_fetch_assoc($querySelect)){
            $id = $registros['matricula'];
            $nome = $registros['nome'];
            $cpf = $registros['cpf'];
            $rg = $registros['rg'];
            $email = $registros['email'];
            $logradouro = $registros['logradouro'];
            $bairro = $registros['bairro'];
            $cidade = $registros['cidade'];
            $estado = $registros['estado'];
            $inicio = $registros['dat_ini_contr'];
            $fim = $registros['dat_fim_contr'];
            $formpgto = $registros['form_pgto'];
            $valor = $registros['valor'];
            $plano = $registros['tp_plano'];
            $qtd = $registros['qtd_parcelas'];
            $aula = $registros['tp_aula'];
        }
    ?>
    <!-- Formulario de Edição-->
    <div class="row"></div>
            <form method="post" action="../bd_php/update_cliente.php">
                <div class="col-sm-5">   
                   <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>" id="nome">
                   </div>
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $email ?>" id="email">
                  </div>
                  <div class="form-group">
                        <label for="endereco">Logradouro</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $logradouro ?>" id="endereco">
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="<?php echo $bairro ?>" id="bairro">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="<?php echo $cidade ?>" id="cidade">
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" value="<?php echo $estado ?>" id="estado">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="aula">Aula</label>
                        <select id="aula" name="aula" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary">
                        <?php
                            $resuls = mysqli_query($conexao,"SELECT * FROM tb_aula where Id_aula= $aula");
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
                                   $resuls = mysqli_query($conexao,"SELECT * FROM tb_aula");
                                    while($rows_aula = mysqli_fetch_assoc($resuls))
                                    {
                                ?>
                            <option value="<?php echo $rows_aula['Id_aula']; ?>">
                                    <?php
                                        echo $rows_aula['descricao'];
                                    ?>
                            </option><?php
                                    }
                                }
                                ?>
                        </select>
                    </div>
                    <div></div>
                    <!--Blue select-->
                </div>
                    <div class="col-md-6">
                         <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="cpf" class="form-control" name="cpf" value="<?php echo $cpf ?>" id="cpf" disabled>
                             
                            <br>

                            <label for="dtinicio">Data Início Contrato</label>
                            <input  type="date" id="dtinicio" name="dtinicio" value="<?php echo $inicio ?>" class="form-control" disabled>

                            <br>

                        <div class="form-group">
                            <label for="options">Forma Pagamento</label>
                            <select id="options" name="options"  onchange="optionCheck()" class="form-control form-control-md colorful-select dropdown-primary" disabled>
                            <?php
                                    $resuls = mysqli_query($conexao,"SELECT * FROM tb_form_pgto where id_form_pgto= $formpgto");
                                    while($rows_aula = mysqli_fetch_assoc($resuls))
                                    {
                                ?>
                            <option value="<?php echo $rows_aula['Id_form_pgto']; ?>">
                                    <?php
                                        echo $rows_aula['descricao'];
                                    ?>
                            </option><?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="optionsPlano">Tipo Plano</label>
                            <select id="optionsPlano" name="optionsPlano" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary" disabled>
                            <?php
                                    $resuls = mysqli_query($conexao,"SELECT * FROM tb_plano where id_plano= $plano");
                                    while($rows_aula = mysqli_fetch_assoc($resuls))
                                    {
                                ?>
                            <option value="<?php echo $rows_aula['Id_plano']; ?>">
                                    <?php
                                        echo $rows_aula['descricao'];
                                    ?>
                            </option><?php
                                    }
                                ?>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <label for="rg">RG</label>
                            <input type="rg" class="form-control" name="rg" value="<?php echo $rg ?>" id="rg">  

                            <br>
                            
                            <label for="dtinicio">Data Termino Contrato</label>
                            <input  type="date" id="dtfim" name="dtfim" value="<?php echo $fim ?>" class="form-control" disabled>
                         </div>
                        <div class="col-md-6">
                            <br>
 
                           <label for="numero">Valor Total (R$)</label>
                            <input type="valor" id="valor" name="valor" value="<?php echo $valor ?>" class="form-control" max="10" min="0" step="2" disabled>
                        </div>
                        <div class="col-md-4">
                               <p></p>
                            <div>
                                <label for="qtd">Parcelas</label>
                                <input type="number" id="qtd" name="qtd" value="<?php echo $qtd ?>"  class="form-control" max="10" min="0" step="2" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info medio" value="alterar" name="alterar" id="alterar" data-toggle="tooltip" data-placement="top" title="Alterar">Alterar</button>
                        <a href="../php/consultaCliente.php" class="btn btn-danger medio">Cancelar</a>
                    </div>
            </form>
<?php include_once '../includes/footer.inc.php'?>