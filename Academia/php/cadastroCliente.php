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
        <!-- Page Content  -->
            <div class="row"></div>
            <h3 id="cabecalho">Cadastro de Clientes</h3>
            <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            session_unset();
            }
        ?>
            <p></p><br>
            <form method="post" action="../bd_php/cad_Cliente.php">
                <div class="col-sm-5">  
                     
                   <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                   </div>
                  <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" name="email" id="email">
                  </div>
                  <div class="form-group">
                        <label for="endereco">Logradouro</label>
                        <input type="text" class="form-control" name="endereco" id="endereco">
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade">
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" id="estado">
                    </div>
                    </div>
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
                    <div></div>
                    <!--Blue select-->
                </div>
                    <div class="col-md-6">
                         <div class="col-md-6">
                            <label for="cpf">CPF</label>
                            <input type="cpf" class="form-control" onchange="validaCPF()" name="cpf" id="cpf" required>
                             
                            <br>

                            <label for="dtinicio">Data Início Contrato</label>
                            <input  type="date" id="dtinicio" name="dtinicio" class="form-control">

                            <br>

                        <div class="form-group">
                            <label for="options">Forma Pagamento</label>
                            <select id="options" name="options" onchange="optionCheck()" class="form-control form-control-md colorful-select dropdown-primary">
                                <option value="Selecione">Selecione</option>
                                <option value="">Selecione</option>
                                <option value="1">A vista</option>
                                <option value="2">Parcelado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="optionsPlano">Tipo Plano</label>
                            <select id="optionsPlano" name="optionsPlano" onchange="optionTipo()" class="form-control form-control-md colorful-select dropdown-primary">
                            <option value="Selecione">Selecione</option>
                                <?php
                                    $resul = "SELECT * FROM tb_plano";
                                    $resuls = mysqli_query($conexao, $resul);
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
                            <input type="rg" class="form-control" name="rg" id="rg">  

                            <br>
                            
                            <label for="dtinicio">Data Termino Contrato</label>
                            <input  type="date" id="dtfim" name="dtfim" class="form-control">
                         </div>
                        <div class="col-md-6">
                            <br>
 
                           <label for="numero">Valor Total (R$)</label>
                            <input type="valor" id="valor" name="valor" class="form-control" max="10" min="0" step="2">
                        </div>
                        <div class="col-md-4">
                               <p></p>
                            <div  id="parcelas"  style="height:100px;width:100px;border:1px;visibility:hidden;">
                                <label for="qtd">Parcelas</label>
                                <input type="number" id="qtd" name="qtd" class="form-control" max="10" min="0" step="2">
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" id="cadastrar" class="btn btn-info medio">Cadastrar</button>
                        <button type="reset" class="btn btn-danger medio">Limpar</button>
                    </div>
            </form>
        </div>
    </div>
<?php include_once '../includes/footer.inc.php' ?>