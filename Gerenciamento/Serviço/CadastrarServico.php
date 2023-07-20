<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaServico.php');
    }

    if(empty($_POST['txtIdUsuario']) ||
    empty($_POST['txtNome']) ||
    empty($_POST['txtDescricao']) ||
    empty($_POST['txtValor']) ||
    empty($_POST['txtStatus']))
    {
        $msg = 'Erro! Preencha todos os campos para Cadastrar uma Serviço';
        return;
    }

    $idUsuario = $_POST['txtIdUsuario'];
    $nome = $_POST['txtNome'];
    $descricao = $_POST['txtDescricao'];
    $valor = $_POST['txtValor'];
    $status = $_POST['txtStatus'];
    $obs = $_POST['txtObs'];

    try {
        $sql = $conn->prepare("
            insert into Servico
            (
                id_Usuario_Servico,
                nome_Servico,
                descricao_Servico,
                publicacao_Servico,
                valor_Servico,
                status_Servico,
                obs_Servico
            )
            values
            (
                :id_Usuario_Servico,
                :nome_Servico,
                :descricao_Servico,
                NOW(),
                :valor_Servico,
                :status_Servico,
                :obs_Servico
            )
        ");

        $sql->execute(array(
            ':id_Usuario_Servico' => $idUsuario,
            ':nome_Servico' => $nome,
            ':descricao_Servico' => $descricao,
            ':valor_Servico' => $valor,
            ':status_Servico' => $status,
            ':obs_Servico' => $obs
        ));

        if ($sql->rowCount()>=1) {
            $idCampo = $conn->lastInsertId();
            include_once('PesquisarServico.php');
            $msg = 'Dados Cadastrados com sucesso. ID Gerado: '.$idCampo;
        }
        else
        {
            $msg = 'Erro no cadastro!';
        }
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>