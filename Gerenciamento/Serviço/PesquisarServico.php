<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header("Location:TelaServico.php");
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
            select S.id_Servico,
                S.id_Usuario_Servico,
                S.nome_Servico,
                S.descricao_Servico,
                S.publicacao_Servico,
                S.valor_Servico,
                S.status_Servico, 
                S.obs_Servico,
                U.nome_Usuario
            from Servico as S
            inner join Usuario as U on U.id_Usuario = S.id_Usuario_Servico
            where S.id_Servico=$id
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idCampo = $row[0];
                $idUsuarioCampo = $row[1];
                $nomeCampo = $row[2];
                $descricaoCampo = $row[3];
                $publicacaoCampo = $row[4];
                $valorCampo = $row[5];
                $statusCampo = $row[6];
                $obsCampo = $row[7];
                $nomeUsuarioCampo = $row[8];
            }
            $msg = 'Busca realizada com sucesso!';
        }
        else
        {
            $msg = 'Erro! Serviço não existe';
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>