<?php
    include_once("../php/conecta_rel.php");

    //declar uma variavel para monstar a tabela
    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
    $dadosXls .= "          <tr>";
    $dadosXls .= "          <th>Matricula</th>";
    $dadosXls .= "          <th>Cliente</th>";
    $dadosXls .= "          <th>Plano</th>";
    $dadosXls .= "          <th>Forma de Pagamento</th>";
    $dadosXls .= "          <th>Valor Total</th>";
    $dadosXls .= "          <th>Parcela</th>";
    $dadosXls .= "          <th>Valor</th>";
    $dadosXls .= "          <th>Vencimento</th>";
    $dadosXls .= "          <th>Data Pagamento</th>";
    $dadosXls .= "          <th>Valor Pago</th>";
    $dadosXls .= "      </tr>";
    //inclui a conexão

    //instancia
    $pdo = new Conexao();
    //manda a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT f.matricula, c.nome, f.numParcela,f.valorTotal, f.valorParcela, 
    f.vencimento, p.descricao as plano, fp.descricao as forma_pg, f.dt_pgto as pagamento, f.valorPago as valorPago
                                    FROM tb_financeiro f 
                                    inner join tb_cliente c on c.matricula = f.matricula
                                    inner join tb_plano p on p.Id_plano = f.plano
                                    inner join tb_form_pgto fp on fp.Id_form_pgto = f.form_pgto
                                    WHERE f.dt_pgto IS NULL");
    //varremos o array com o foreach para pegar os dados
    foreach($result as $res){
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <td>".$res['matricula']."</td>";
        $dadosXls .= "          <td>".$res['nome']."</td>";
        $dadosXls .= "          <td>".$res['plano']."</td>";
        $dadosXls .= "          <td>".$res['forma_pg']."</td>";
        $dadosXls .= "          <td>".$res['valorTotal']."</td>";
        $dadosXls .= "          <td>".$res['numParcela']."</td>";
        $dadosXls .= "          <td>".$res['valorParcela']."</td>";
        $dadosXls .= "          <td>".$res['vencimento']."</td>";
        $dadosXls .= "          <td>".$res['pagamento']."</td>";
        $dadosXls .= "          <td>".$res['valorPago']."</td>";
        $dadosXls .= "      </tr>";
    }
    $dadosXls .= "  </table>";
 
    // Defini o nome do arquivo que será exportado  
    $arquivo = "MinhaPlanilha.xls";  
    // Configurações header para forçar o download  
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');
       
    // Envia o conteúdo do arquivo  
    echo $dadosXls;  
    exit;
?>