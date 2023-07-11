<?php
    include_once('../../Conexão/conexao.php');

    if(!$_POST)
    {
        header('Location:TelaProjeto.php');
    }

    if(empty($_POST['txtIdUsuario']) ||
    empty($_POST['txtNome']) ||
    empty($_POST['txtLink']) ||
    empty($_FILES['txtImg']['name']) ||
    empty($_POST['txtStatus']))
    {
        $msg = 'Erro! Preencha todos os campos para Cadastrar uma Projeto';
        return;
    }

    $situacao = FALSE;

    $idUsuario = $_POST['txtIdUsuario'];
    $nome = $_POST['txtNome'];
    $link = $_POST['txtLink'];
    $img = $_FILES['txtImg']['tmp_name'];
    $status = $_POST['txtStatus'];
    $obs = $_POST['txtObs'];

    //Convertendo a img em base64
    if(!($img == NULL))
    {
        $img = base64_encode(file_get_contents($img));
    }

    try {
        $sql = $conn->prepare("
            insert into Projeto
            (
                id_Usuario_Projeto,
                nome_Projeto,
                link_Projeto,
                img_Projeto,
                status_Projeto,
                obs_Projeto
            )
            values
            (
                :id_Usuario_Projeto,
                :nome_Projeto,
                :link_Projeto,
                :img_Projeto,
                :status_Projeto,
                :obs_Projeto
            )
        ");

        $sql->execute(array(
            ':id_Usuario_Projeto' => $idUsuario,
            ':nome_Projeto' => $nome,
            ':link_Projeto' => $link,
            ':img_Projeto' => $img,
            ':status_Projeto' => $status,
            ':obs_Projeto' => $obs
        ));

        if ($sql->rowCount()>=1) {
            $idCampo = $conn->lastInsertId();
            //$situacao = TRUE;
            include_once('PesquisarProjeto.php');
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