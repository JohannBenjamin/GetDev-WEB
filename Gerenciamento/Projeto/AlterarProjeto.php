<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaProjeto.php');
    }

    if(empty($_POST['txtId']))
    { 
        $msg = 'Erro! Informe o Id para alterar';
        return;
    }

    $id = $_POST['txtId'];

    try {
        $sql = $conn->query("
            select * from Projeto where id_Projeto=$id
        ");

        if ($sql->rowCount()>=1) {
            foreach ($sql as $row) {
                $idUsuario = $row[1];
                $nome = $row[2];
                $link = $row[3];
                $img = $row[4];
                $status = $row[5];
                $obs = $row[6];
            }
        }
        else
        {
            $msg = 'Erro! Projeto não existe';
            return;
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }

    if(empty($_POST['txtIdUsuario']) &&
    empty($_POST['txtNome']) &&
    empty($_POST['txtLink']) &&
    empty($_FILES['txtImg']['name']) &&
    empty($_POST['txtStatus']) &&
    empty($_POST['txtObs']))
    {
        $msg = 'Nenhum dado a Alterar!';
        return;
    }

    $img = NULL;

    if(!empty($_POST['txtIdUsuario']))
    {
        $idUsuario = $_POST['txtIdUsuario'];
    }
    if(!empty($_POST['txtNome']))
    {
        $nome = $_POST['txtNome'];
    }
    if(!empty($_POST['txtLink']))
    {
        $link = $_POST['txtLink'];
    }
    if(!empty($_FILES['txtImg']['tmp_name']))
    {
        $img = base64_encode(file_get_contents($_FILES['txtImg']['tmp_name']));
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
            update Projeto set
                id_Usuario_Projeto=:id_Usuario_Projeto,
                nome_Projeto=:nome_Projeto,
                link_Projeto=:link_Projeto,
                img_Projeto=:img_Projeto,
                status_Projeto=:status_Projeto,
                obs_Projeto=:obs_Projeto
            where id_Projeto=:id_Projeto
        ");

        $sql->execute(array(
            ':id_Projeto'=>$id,
            ':id_Usuario_Projeto'=>$idUsuario,
            ':nome_Projeto' => $nome,
            ':link_Projeto'=>$link,
            ':img_Projeto'=>$img,
            ':status_Projeto' => $status,
            ':obs_Projeto' => $obs
        ));

        if ($sql->rowCount()>=1) {
            //$situacao = TRUE;
            $idCampo = $id;
            include_once('PesquisarProjeto.php');
            $msg = 'Dados Alterados com sucesso';
        }
        else
        {
            $msg = 'Erro na alteração!';
            //$situacao = FALSE;
        }

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
    }
?>