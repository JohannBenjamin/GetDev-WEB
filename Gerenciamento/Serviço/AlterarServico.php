<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaServico.php');
    }

    if(empty($_POST['txtId']))
    { 
        $msg = 'Erro! Informe o Id para alterar';
        return;
    }

    $id = $_POST['txtId'];

    try {
        $sql = $conn->query("
            select * from Servico where id_Servico=$id
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idUsuario = $row[1];
                $nome = $row[2];
                $descricao = $row[3];
                $publicacao = $row[4];
                $valor = $row[5];
                $status = $row[6];
                $obs = $row[7];
            }
        }
        else
        {
            $msg = 'Erro! Serviço não existe';
            return;
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }

    if(empty($_POST['txtIdUsuario']) &&
    empty($_POST['txtNome']) &&
    empty($_POST['txtDescricao']) &&
    empty($_POST['txtValor']) &&
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
    if(!empty($_POST['txtNome']))
    {
        $nome = $_POST['txtNome'];
    }
    if(!empty($_POST['txtDescricao']))
    {
        $descricao = $_POST['txtDescricao'];
    }
    if(!empty($_POST['txtValor']))
    {
        $valor = $_POST['txtValor'];
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
            update Servico set
                id_Usuario_Servico=:id_Usuario_Servico,
                nome_Servico=:nome_Servico,
                descricao_Servico=:descricao_Servico,
                valor_Servico=:valor_Servico,
                status_Servico=:status_Servico,
                obs_Servico=:obs_Servico
            where id_Servico=:id_Servico
        ");

        $sql->execute(array(
            ':id_Servico'=>$id,
            ':id_Usuario_Servico'=>$idUsuario,
            ':nome_Servico'=>$nome,
            ':descricao_Servico' => $descricao,
            ':valor_Servico'=>$valor,
            ':status_Servico' => $status,
            ':obs_Servico' => $obs
        ));

        if ($sql->rowCount()>=1) {
            $idCampo = $id;
            include_once('PesquisarServico.php');
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