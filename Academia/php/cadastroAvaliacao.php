<?php 
    session_start();
    include_once("../php/conexao.php");

    $nome = $_SESSION['nome'];    
    if(!isset($_SESSION['login'])){
    header("Location:../index.php?erro=1");
    }
?>
<?php include_once '../includes/header.inc.php'  ?>
    <div class="wrapper">
<?php include_once '../includes/menu_fisio.php'  ?>
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
    <form method="post" action="../bd_php/cad_Avaliacao.php">
        <div class="col-sm-12"> 
        <div class="form-row">    
           <div class="form-group col-sm-5">
                <label for="fisio">Fisioterapeuta</label>
                <input type="text" class="form-control" name="fisio" value="<?php echo $nome ?>" id="fisio">
           </div>
           <div class="form-group col-sm-3"> 
                <label for="matricula">Matricula</label>
                <input type="text" class="form-control" name="matricula">
           </div>
           <div class="form-group col-sm-4"> 
                <label for="dtavali">Data Avaliação</label>
                <input type="date" class="form-control" name="dtavali" id="dtavali">
           </div>
        </div>
        <div class="form-row">    
           <div class="form-group col-md-2">
                <label for="pamedia">Panturrilha medial</label>
                <input type="text" class="form-control" name="pamedia" id="pamedia">
           </div>
           <div class="form-group col-md-2"> 
                <label for="iliaca">Supra-iliaca</label>
                <input type="text" class="form-control" name="iliaca" id="iliaca">
           </div>
           <div class="form-group col-md-2"> 
                <label for="abdominal">Abdominal</label>
                <input type="text" class="form-control" name="abdominal" id="abdominal">
           </div>
           <div class="form-group col-md-2">
                <label for="axilar">Axilar média</label>
                <input  type="text" name="axilar" class="form-control" id="axilar" >
            </div>
            <div class="form-group col-md-2">
                <label for="biceps">Bíceps</label>
                <input  type="text"  name="biceps" class="form-control" id="biceps">
            </div>
            <div class="form-group col-md-2">
                <label for="peitoral">Peitoral</label>
                <input  type="text" name="peitoral" class="form-control" id="peitoral">
            </div>
        </div>
        <div class="form-row">    
           <div class="form-group col-sm-2">
                <label for="subescapular">Subescapular</label>
                <input type="text" class="form-control" name="subescapular" id="subescapular">
           </div>
           <div class="form-group col-sm-2"> 
                <label for="estagio">Estagio</label>
                <input type="text" class="form-control" name="estagio" id="estagio">
           </div>
           <div class="form-group col-sm-2"> 
                <label for="tempo">Tempo</label>
                <input type="text" class="form-control" name="tempo" id="tempo">
           </div>
           <div class="form-group col-sm-2">
                <label for="fc">FC(BPM)</label>
                <input type="text" class="form-control" name="fc" id="fc">
           </div>
           <div class="form-group col-sm-2"> 
                <label for="produto">Duplo Produto</label>
                <input type="text" class="form-control" name="produto" id="produto">
           </div> 
           <div class="form-group col-sm-2"> 
                <label for="pd">PD</label>
                <input type="text" class="form-control" name="pd"  id="pd">
           </div>
           <div class="form-group col-sm-2">
                <label for="ps">PS</label>
                <input type="text" class="form-control" name="ps" id="ps">
           </div>
           <div class="form-group col-sm-2"> 
                <label for="mv">MV02</label>
                <input type="text" class="form-control" name="mv" id="mv">
           </div>
           <div class="form-group col-sm-2"> 
                <label for="triceps">Tríceps</label>
                <input type="text" class="form-control" name="triceps" id="triceps">
           </div>
        </div>
        <div class="form-row">    
           <div class="form-group col-sm-12">
                <label for="exampleFormControlTextarea1">Anamnese do Cliente</label>
                <textarea class="form-control" id="anamnese" rows="6"></textarea>
           </div>
        </div>
        </div>
           <p></p><p></p><p></p>
            <div>
                <button type="submit" id="cadastrar" class="btn btn-info medio">Cadastrar</button>
                <button type="reset" class="btn btn-danger medio">Limpar</button>
            </div>
            </div>
    </form>
</div>
<?php include_once '../includes/footer.inc.php' ?>