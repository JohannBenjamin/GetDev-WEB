<?php
    include_once('../../Conexão/conexao.php');

    try {
        $sql = $conn->query("
            select S.id_Servico, S.nome_Servico, U.nome_Usuario, S.descricao_Servico, DATEDIFF(NOW(), S.publicacao_Servico), S.valor_Servico from Servico as S
            inner join Usuario as U on U.id_Usuario = S.id_Usuario_Servico
            where S.status_Servico like 'Ativo'
            order by S.publicacao_Servico DESC
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idServico = $row[0];
                $nomeServico = $row[1];
                $nomeUsuario = $row[2];
                $descricaoServico = $row[3];
                $publicacaoServico = $row[4];
                $valorServico = $row[5];

                $textoDias = ($publicacaoServico == 0)? "Hoje" : "$publicacaoServico"." dias atrás";
                $textoDesc = (strlen($descricaoServico) >= 300)? substr($descricaoServico, 0, 299).".." : $descricaoServico;
                
                include("BuscaServicoLinguagens.php");
                include("BuscaPropostas.php");
                
                echo 
                "
                <div class='card text-white my-4' style='background-color:#36397B;'>
                    <div class='card-body'>
                        <div class='row d-flex'>
                            <div class='col-sm-2 text-center align-self-center'>
                                <div class=''>
                                    <h4><b>R$ $valorServico</b></h4>
                                    <h6>$textoDias</h6>
                                </div>
                                <div class='align-self-end'>
                                    <p>".($numPropostas == 1? $numPropostas.' Proposta' : $numPropostas.' Propostas')."</p>
                                </div>
                            </div>
                            <div class='col-sm-10'>
                                <div class='row'>
                                    <div class='col-sm-9'>
                                        <h2>$nomeServico</h2>
                                    </div>
                                    <div class='col-sm-3 align-self-center text-center rounded-3 pt-1' style='background-color: #686BA3'>
                                        <h6>$nomeUsuario</h6>
                                    </div>
                                </div>
                                <div class='row'>
                                    <p class='text-center my-2 rounded-3 py-1' style='max-height: 14vh; background-color: #686BA3'>$textoDesc</p>
                                </div>
                                <div class='d-inline-block'>
                                    $btnLinguagens
                                </div>
                                <div class='text-end mt-2'>
                                    <button class='btn btn-secondary'>Tenho interesse</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>