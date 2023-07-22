<?php
    include_once('../../Conexão/conexao.php');

    $situacao = false;
    $opcao1 = false;
    $opcao2 = false;
    $opcao3 = false;
    $texto = '';
    foreach ($_GET as $filtro => $valor) {

        if($filtro != "momento" && $filtro != "rangeProposta") {
            if(trim($texto) == "") {
                $texto = " and ( ";
            }
            else {
                $texto = $texto." or ";
            }
            $texto = $texto." L.nome_Linguagem = '$valor' ";
        }

        if($filtro == "momento") {
            if($texto != "") {
                $texto = $texto." ) ";
            }
            $texto = $texto." and DATEDIFF(NOW(), S.publicacao_Servico) <=".$valor;
        }
        if($filtro == "rangeProposta") {
            if($valor == "0-1") {
                $opcao1 = true;
            }
            elseif($valor == "2-4") {
                $opcao2 = true;
            }
            else{
                $opcao3 = true;
            }
        }
    }

    try {
        $sql = $conn->query("
            select S.id_Servico, S.nome_Servico, U.nome_Usuario, S.descricao_Servico, DATEDIFF(NOW(), S.publicacao_Servico), S.valor_Servico from Servico as S
            inner join Usuario as U on U.id_Usuario = S.id_Usuario_Servico
            inner join ServicoLinguagem as SL on SL.id_Servico_ServicoLinguagem = S.id_Servico
            inner join Linguagem as L on L.id_Linguagem = SL.id_Linguagem_ServicoLinguagem
            where S.status_Servico like 'Ativo' $texto
            group by S.id_Servico
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

                if($opcao1) {
                    if($numPropostas >= 0 && $numPropostas <= 1){
                        $situacao = TRUE;
                    }
                }
                if($opcao2) {
                    if($numPropostas >= 2 && $numPropostas <= 4){
                        $situacao = TRUE;
                    }
                }
                if($opcao3) {
                    if($numPropostas >= 5){
                        $situacao = TRUE;
                    }
                }

                if($situacao)
                {
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
                                        <p class='text-center my-2 rounded-3 py-1' style='max-height: 10vh; background-color: #686BA3'>$textoDesc</p>
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
                    $situacao = false;
                }
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
?>