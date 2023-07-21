<?php
    include_once('../../Conexão/conexao.php');
    $btnLinguagens = '';

    try {
        $sql = $conn->query("
            select L.nome_Linguagem from ServicoLinguagem as SL
            inner join Linguagem as L on L.id_Linguagem = SL.id_Linguagem_ServicoLinguagem
            where SL.id_Servico_ServicoLinguagem = $idServico
            order by L.id_Linguagem
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $btnLinguagens = $btnLinguagens.
                "
                    <button class='d-inline-block rounded-3 p-1 btn btn-outline-light border-0' style='background-color: #686BA3'>$row[0]</button>\r\n
                ";
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>