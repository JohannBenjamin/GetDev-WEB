<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select count(P.id_Servico_Proposta) from Proposta as P
            inner join Servico as S on S.id_Servico = P.id_Servico_Proposta
            where P.id_Servico_Proposta = $idServico
            group by P.id_Servico_Proposta
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $numPropostas = $row[0];
            }
        }
        else
        {
            $numPropostas = 0;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>