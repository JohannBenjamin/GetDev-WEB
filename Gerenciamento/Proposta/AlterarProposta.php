<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaProposta.php');
    }

    if(empty($_POST['txtId']))
    { 
        $msg = 'Erro! Informe o Id para alterar';
        return;
    }

    $id = $_POST['txtId'];

    try {
        $sql = $conn->query("
            select * from Proposta where id_Proposta=$id
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idUsuario = $row[1];
                $idServico = $row[2];
                $descricao = $row[3];
                $valor = $row[4];
                $celular = $row[5];
                $email = $row[6];
                $publicacao = $row[7];
                $status = $row[8];
                $obs = $row[9];
            }
        }
        else
        {
            $msg = 'Erro! Proposta não existe';
            return;
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }

    if(empty($_POST['txtIdUsuario']) &&
    empty($_POST['txtIdServico']) &&
    empty($_POST['txtDescricao']) &&
    empty($_POST['txtValor']) &&
    empty($_POST['txtCelular']) &&
    empty($_POST['txtEmail']) &&
    empty($_POST['txtStatus']) &&
    empty($_POST['txtObs']))
    {
        $msg = 'Nenhum dado a Alterar!';
        return;
    }

    if(!empty($_POST['txtIdUsuario']))
    {
        $idUsuario = $_POST['txtIdUsuario'];
    }
    if(!empty($_POST['txtIdServico']))
    {
        $idServico = $_POST['txtServico'];
    }
    if(!empty($_POST['txtDescricao']))
    {
        $descricao = $_POST['txtDescricao'];
    }
    if(!empty($_POST['txtValor']))
    {
        $valor = $_POST['txtValor'];
    }
    if(!empty($_POST['txtCelular']))
    {
        $celular = $_POST['txtCelular'];
    }
    if(!empty($_POST['txtEmail']))
    {
        $email = $_POST['txtEmail'];
    }
    if(!empty($_POST['txtStatus']))
    {
        $status = $_POST['txtStatus'];
    }
    if(!empty($_POST['txtObs']))
    {
        $obs = $_POST['txtObs'];
    }

    try {
        $sql = $conn->prepare("
            update Proposta set
                id_Usuario_Proposta=:id_Usuario_Proposta,
                id_Servico_Proposta=:id_Servico_Proposta,
                descricao_Proposta=:descricao_Proposta,
                valor_Proposta=:valor_Proposta,
                celular_Proposta=:celular_Proposta,
                email_Proposta=:email_Proposta,
                status_Proposta=:status_Proposta,
                obs_Proposta=:obs_Proposta
            where id_Proposta=:id_Proposta
        ");

        $sql->execute(array(
            ':id_Proposta'=>$id,
            ':id_Usuario_Proposta'=>$idUsuario,
            ':id_Servico_Proposta'=>$idServico,
            ':descricao_Proposta' => $descricao,
            ':valor_Proposta'=>$valor,
            ':celular_Proposta'=>$celular,
            ':email_Proposta'=>$email,
            ':status_Proposta' => $status,
            ':obs_Proposta' => $obs
        ));

        if ($sql->rowCount()>=1) {
            $idCampo = $id;
            include_once('PesquisarProposta.php');
            $msg = 'Dados Alterados com sucesso';
        }
        else
        {
            $msg = 'Erro na alteração!';
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>