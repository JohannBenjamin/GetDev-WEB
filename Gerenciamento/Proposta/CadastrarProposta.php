<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaProposta.php');
    }

    if(empty($_POST['txtIdUsuario']) ||
    empty($_POST['txtIdServico']) ||
    empty($_POST['txtDescricao']) ||
    empty($_POST['txtValor']) ||
    empty($_POST['txtStatus']))
    {
        $msg = 'Erro! Preencha todos os campos para Cadastrar uma Proposta';
        return;
    }

    $idUsuario = $_POST['txtIdUsuario'];
    $idServico = $_POST['txtIdServico'];
    $descricao = $_POST['txtDescricao'];
    $valor = $_POST['txtValor'];
    $celular = $_POST['txtCelular'];
    $email = $_POST['txtEmail'];
    $status = $_POST['txtStatus'];
    $obs = $_POST['txtObs'];

    include_once('VerificarProposta.php');
    if($situacao)
    {
        $msg = "Usuário não pode propor para ele mesmo";
        return;
    }

    try {
        $sql = $conn->prepare("
            insert into Proposta
            (
                id_Usuario_Proposta,
                id_Servico_Proposta,
                descricao_Proposta,
                valor_Proposta,
                celular_Proposta,
                email_Proposta,
                publicacao_Proposta,
                status_Proposta,
                obs_Proposta
            )
            values
            (
                :id_Usuario_Proposta,
                :id_Servico_Proposta,
                :descricao_Proposta,
                :valor_Proposta,
                :celular_Proposta,
                :email_Proposta,
                NOW(),
                :status_Proposta,
                :obs_Proposta
            )
        ");

        $sql->execute(array(
            ':id_Usuario_Proposta' => $idUsuario,
            ':id_Servico_Proposta' => $idServico,
            ':descricao_Proposta' => $descricao,
            ':valor_Proposta' => $valor,
            ':celular_Proposta' => $celular,
            ':email_Proposta' => $email,
            ':status_Proposta' => $status,
            ':obs_Proposta' => $obs
        ));

        if ($sql->rowCount()>=1) {
            $idCampo = $conn->lastInsertId();
            include_once('PesquisarProposta.php');
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