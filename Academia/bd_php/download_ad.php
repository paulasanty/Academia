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
    $dadosXls .= "          <th>CPF</th>";
    $dadosXls .= "          <th>RG</th>";
    $dadosXls .= "          <th>E-Mail</th>";
    $dadosXls .= "          <th>Logradouro</th>";
    $dadosXls .= "          <th>Bairro</th>";
    $dadosXls .= "          <th>Cidade</th>";
    $dadosXls .= "          <th>Estado</th>";
    $dadosXls .= "          <th>Tipo Aula</th>";
    $dadosXls .= "          <th>IníciO Contrato</th>";
    $dadosXls .= "          <th>Término Contrato</th>";
    $dadosXls .= "          <th>Quatidade de Parcelas</th>";
    $dadosXls .= "      </tr>";
    //inclui a conexão

    //instancia
    $pdo = new Conexao();
    //manda a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT c.matricula,
                                c.nome, 
                                p.descricao as plano, 
                                fp.descricao as forma_pg,
                                c.cpf, 
                                c.rg, 
                                c.email, 
                                c.logradouro, 
                                c.bairro, 
                                c.cidade, 
                                c.estado, 
                                a.descricao as aula, 
                                c.dat_ini_contr, 
                                c.dat_fim_contr, 
                                c.qtd_parcelas
                            FROM tb_cliente c
                            left join tb_aula a on a.Id_aula = c.tp_aula
                            left join tb_form_pgto fp on fp.Id_form_pgto = c.form_pgto
                            left join tb_plano p on p.Id_plano = c.tp_plano");
    //varremos o array com o foreach para pegar os dados
    foreach($result as $res){
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <td>".$res['matricula']."</td>";
        $dadosXls .= "          <td>".$res['nome']."</td>";
        $dadosXls .= "          <td>".$res['plano']."</td>";
        $dadosXls .= "          <td>".$res['forma_pg']."</td>";
        $dadosXls .= "          <td>".$res['cpf']."</td>";
        $dadosXls .= "          <td>".$res['rg']."</td>";
        $dadosXls .= "          <td>".$res['email']."</td>";
        $dadosXls .= "          <td>".$res['logradouro']."</td>";
        $dadosXls .= "          <td>".$res['bairro']."</td>";
        $dadosXls .= "          <td>".$res['cidade']."</td>";
        $dadosXls .= "          <td>".$res['estado']."</td>";
        $dadosXls .= "          <td>".$res['aula']."</td>";
        $dadosXls .= "          <td>".$res['dat_ini_contr']."</td>";
        $dadosXls .= "          <td>".$res['dat_fim_contr']."</td>";
        $dadosXls .= "          <td>".$res['qtd_parcelas']."</td>";
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