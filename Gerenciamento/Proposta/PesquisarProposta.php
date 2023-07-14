<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header("Location:TelaProposta.php");
    }

    if(empty($_POST['txtId']) && empty($idCampo))
    {
        $msg = 'Erro! Informe o Id para Pesquisar.';
        return;
    }

    $id = $_POST['txtId'];
    if(!empty($idCampo))
    {
        $id = $idCampo;
    }

    try {
        $sql = $conn->query("
            select P.id_Proposta,
                P.id_Usuario_Proposta,
                P.id_Servico_Proposta,
                P.descricao_Proposta,
                P.valor_Proposta,
                P.celular_Proposta,
                P.email_Proposta,
                P.publicacao_Proposta,
                P.status_Proposta, 
                P.obs_Proposta,
                U.nome_Usuario
            from Proposta as P
            inner join Usuario as U on U.id_Usuario = P.id_Usuario_Proposta
            where P.id_Proposta=$id
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idCampo = $row[0];
                $idUsuarioCampo = $row[1];
                $idServicoCampo = $row[2];
                $descricaoCampo = $row[3];
                $valorCampo = $row[4];
                $celularCampo = $row[5];
                $emailCampo = $row[6];
                $publicacaoCampo = $row[7];
                $statusCampo = $row[8];
                $obsCampo = $row[9];
                $nomeUsuarioCampo = $row[10];
            }
            $msg = 'Busca realizada com sucesso!';
        }
        else
        {
            $msg = 'Erro! Proposta não existe';
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>