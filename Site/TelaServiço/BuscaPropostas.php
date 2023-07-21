<?php
    include_once('../../Conexão/conexao.php');
    $btnLinguagens = '';

    try {
        $sql = $conn->query("
            select count(P.id_Servico_Proposta) from Proposta as P
            inner join Servico as S on S.id_Servico = P.id_Servico_Proposta
            where P.id_Servico_Proposta = $idServico
            group by P.id_Servico_Proposta
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                if($row[0] == 1)
                {
                    $numPropostas = $row[0]." Proposta";
                }
                else
                {
                    $numPropostas = $row[0]." Propostas";
                }
                
            }
        }
        else
        {
            $numPropostas = "0 Propostas";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>